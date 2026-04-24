<?php

namespace Tests\Feature\Dosen;

use App\Models\Dosen;
use App\Models\Penelitian;
use App\Models\Skim;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PenelitianTest extends TestCase
{
    use RefreshDatabase;

    private Dosen $dosen;
    private Skim $skim;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dosen = Dosen::factory()->create();
        $this->skim  = Skim::factory()->create();
    }

    private function validPenelitianData(array $overrides = []): array
    {
        return array_merge([
            'judul'               => 'Penelitian Kecerdasan Buatan',
            'hibah'               => 'Hibah DIKTI',
            'skim_id'             => $this->skim->id,
            'tahun_usulan'        => 2024,
            'tahun_kegiatan'      => 2024,
            'tahun_pelaksanaan'   => 2024,
            'lama_kegiatan'       => 12,
            'dana_dikti'          => 50000000,
            'dana_pt'             => 10000000,
            'dana_institusi_lain' => 0,
            'posisi'              => 'Ketua',
            'no_sk'               => 'SK/001/2024',
        ], $overrides);
    }

    // -------------------------------------------------------
    // Index
    // -------------------------------------------------------

    public function test_dosen_can_view_penelitian_list(): void
    {
        $this->actingAs($this->dosen, 'dosen')
            ->get(route('penelitian.index'))
            ->assertStatus(200);
    }

    public function test_penelitian_index_shows_only_own_penelitian(): void
    {
        $otherDosen = Dosen::factory()->create();

        Penelitian::create(array_merge($this->validPenelitianData(), [
            'dosen_id' => $this->dosen->id,
            'judul'    => 'Penelitian Saya',
        ]));

        Penelitian::create(array_merge($this->validPenelitianData(), [
            'dosen_id' => $otherDosen->id,
            'judul'    => 'Penelitian Orang Lain',
        ]));

        $response = $this->actingAs($this->dosen, 'dosen')
            ->get(route('penelitian.index'));

        $response->assertSee('Penelitian Saya');
        $response->assertDontSee('Penelitian Orang Lain');
    }

    // -------------------------------------------------------
    // Create
    // -------------------------------------------------------

    public function test_dosen_can_view_create_penelitian_form(): void
    {
        $this->actingAs($this->dosen, 'dosen')
            ->get(route('penelitian.create'))
            ->assertStatus(200);
    }

    // -------------------------------------------------------
    // Store
    // -------------------------------------------------------

    public function test_dosen_can_create_penelitian(): void
    {
        $response = $this->actingAs($this->dosen, 'dosen')
            ->post(route('penelitian.store'), $this->validPenelitianData());

        $response->assertRedirect(route('penelitian.create'));
        $this->assertDatabaseHas('penelitians', [
            'dosen_id' => $this->dosen->id,
            'judul'    => 'Penelitian Kecerdasan Buatan',
        ]);
    }

    public function test_store_saves_dosen_id_from_auth(): void
    {
        $this->actingAs($this->dosen, 'dosen')
            ->post(route('penelitian.store'), $this->validPenelitianData());

        $penelitian = Penelitian::where('judul', 'Penelitian Kecerdasan Buatan')->first();
        $this->assertEquals($this->dosen->id, $penelitian->dosen_id);
    }

    public function test_dosen_can_upload_files_when_creating_penelitian(): void
    {
        Storage::fake('local');

        $data = array_merge($this->validPenelitianData(), [
            'sk_penugasan'       => UploadedFile::fake()->create('sk.pdf', 100, 'application/pdf'),
            'laporan'            => UploadedFile::fake()->create('laporan.pdf', 100, 'application/pdf'),
            'kontrak_penelitian' => UploadedFile::fake()->create('kontrak.pdf', 100, 'application/pdf'),
        ]);

        $this->actingAs($this->dosen, 'dosen')
            ->post(route('penelitian.store'), $data)
            ->assertRedirect(route('penelitian.create'));

        $penelitian = Penelitian::where('dosen_id', $this->dosen->id)->first();
        $this->assertNotNull($penelitian->sk_penugasan);
        $this->assertNotNull($penelitian->laporan);
        $this->assertNotNull($penelitian->kontrak_penelitian);
        Storage::assertExists($penelitian->sk_penugasan);
        Storage::assertExists($penelitian->laporan);
        Storage::assertExists($penelitian->kontrak_penelitian);
    }

    public function test_store_validates_required_fields(): void
    {
        $this->actingAs($this->dosen, 'dosen')
            ->post(route('penelitian.store'), [])
            ->assertSessionHasErrors([
                'judul', 'hibah', 'skim_id', 'tahun_usulan', 'tahun_kegiatan',
                'tahun_pelaksanaan', 'lama_kegiatan', 'dana_dikti', 'dana_pt',
                'dana_institusi_lain', 'posisi', 'no_sk',
            ]);
    }

    public function test_store_validates_skim_id_exists(): void
    {
        $data = $this->validPenelitianData(['skim_id' => 9999]);

        $this->actingAs($this->dosen, 'dosen')
            ->post(route('penelitian.store'), $data)
            ->assertSessionHasErrors('skim_id');
    }

    public function test_store_validates_file_mime_types(): void
    {
        Storage::fake('local');

        $data = array_merge($this->validPenelitianData(), [
            'sk_penugasan' => UploadedFile::fake()->create('sk.exe', 100, 'application/x-msdownload'),
        ]);

        $this->actingAs($this->dosen, 'dosen')
            ->post(route('penelitian.store'), $data)
            ->assertSessionHasErrors('sk_penugasan');
    }

    public function test_digunakan_di_masyarakat_checkbox_defaults_to_false(): void
    {
        $data = $this->validPenelitianData();
        unset($data['digunakan_di_masyarakat']);

        $this->actingAs($this->dosen, 'dosen')
            ->post(route('penelitian.store'), $data);

        $this->assertDatabaseHas('penelitians', [
            'dosen_id'                => $this->dosen->id,
            'digunakan_di_masyarakat' => 0,
        ]);
    }

    // -------------------------------------------------------
    // Show
    // -------------------------------------------------------

    public function test_dosen_can_view_penelitian_detail(): void
    {
        $penelitian = Penelitian::create(array_merge($this->validPenelitianData(), [
            'dosen_id' => $this->dosen->id,
        ]));

        $this->actingAs($this->dosen, 'dosen')
            ->get(route('penelitian.show', $penelitian))
            ->assertStatus(200);
    }

    // -------------------------------------------------------
    // Edit & Update
    // -------------------------------------------------------

    public function test_dosen_can_view_edit_penelitian_form(): void
    {
        $penelitian = Penelitian::create(array_merge($this->validPenelitianData(), [
            'dosen_id' => $this->dosen->id,
        ]));

        $this->actingAs($this->dosen, 'dosen')
            ->get(route('penelitian.edit', $penelitian))
            ->assertStatus(200);
    }

    public function test_dosen_can_update_penelitian(): void
    {
        $penelitian = Penelitian::create(array_merge($this->validPenelitianData(), [
            'dosen_id' => $this->dosen->id,
        ]));

        $response = $this->actingAs($this->dosen, 'dosen')
            ->put(route('penelitian.update', $penelitian), array_merge(
                $this->validPenelitianData(['judul' => 'Judul Diperbarui']),
                ['digunakan_di_masyarakat' => 1]
            ));

        $response->assertRedirect(route('penelitian.show', $penelitian));
        $this->assertDatabaseHas('penelitians', [
            'id'    => $penelitian->id,
            'judul' => 'Judul Diperbarui',
        ]);
    }

    public function test_update_replaces_old_file_with_new_one(): void
    {
        Storage::fake('local');

        // Buat penelitian dengan file awal
        $oldFile = UploadedFile::fake()->create('old.pdf', 100, 'application/pdf');
        $oldPath = $oldFile->store('sk_penugasan');

        $penelitian = Penelitian::create(array_merge($this->validPenelitianData(), [
            'dosen_id'     => $this->dosen->id,
            'sk_penugasan' => $oldPath,
        ]));

        // Update dengan file baru
        $newFile = UploadedFile::fake()->create('new.pdf', 100, 'application/pdf');

        $this->actingAs($this->dosen, 'dosen')
            ->put(route('penelitian.update', $penelitian), array_merge(
                $this->validPenelitianData(['judul' => 'Judul Baru']),
                [
                    'digunakan_di_masyarakat' => 1,
                    'sk_penugasan'            => $newFile,
                ]
            ));

        // File lama harus terhapus
        Storage::assertMissing($oldPath);

        // File baru harus ada
        $penelitian->refresh();
        Storage::assertExists($penelitian->sk_penugasan);
    }

    // -------------------------------------------------------
    // Destroy
    // -------------------------------------------------------

    public function test_dosen_can_delete_penelitian(): void
    {
        $penelitian = Penelitian::create(array_merge($this->validPenelitianData(), [
            'dosen_id' => $this->dosen->id,
        ]));

        $this->actingAs($this->dosen, 'dosen')
            ->delete(route('penelitian.destroy', $penelitian))
            ->assertRedirect(route('penelitian.index'));

        $this->assertDatabaseMissing('penelitians', ['id' => $penelitian->id]);
    }

    public function test_destroy_deletes_associated_files(): void
    {
        Storage::fake('local');

        $file     = UploadedFile::fake()->create('laporan.pdf', 100, 'application/pdf');
        $filePath = $file->store('laporan');

        $penelitian = Penelitian::create(array_merge($this->validPenelitianData(), [
            'dosen_id' => $this->dosen->id,
            'laporan'  => $filePath,
        ]));

        $this->actingAs($this->dosen, 'dosen')
            ->delete(route('penelitian.destroy', $penelitian));

        Storage::assertMissing($filePath);
    }

    // -------------------------------------------------------
    // Guard
    // -------------------------------------------------------

    public function test_guest_cannot_access_penelitian_routes(): void
    {
        $this->get(route('penelitian.index'))->assertRedirect('/dosen/login');
        $this->get(route('penelitian.create'))->assertRedirect('/dosen/login');
    }
}
