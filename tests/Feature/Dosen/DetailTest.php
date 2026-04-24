<?php

namespace Tests\Feature\Dosen;

use App\Models\Detail;
use App\Models\Dosen;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DetailTest extends TestCase
{
    use RefreshDatabase;

    private Dosen $dosen;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dosen = Dosen::factory()->create();
    }

    // -------------------------------------------------------
    // Index
    // -------------------------------------------------------

    public function test_dosen_can_view_detail_index_page(): void
    {
        $this->actingAs($this->dosen, 'dosen')
            ->get(route('detail.index'))
            ->assertStatus(200);
    }

    public function test_detail_index_shows_null_when_no_detail_exists(): void
    {
        $response = $this->actingAs($this->dosen, 'dosen')
            ->get(route('detail.index'));

        $response->assertStatus(200);
    }

    public function test_detail_index_shows_existing_detail(): void
    {
        $detail = Detail::create([
            'dosen_id'      => $this->dosen->id,
            'tempat_lahir'  => 'Bandung',
            'tanggal_lahir' => '1990-01-01',
            'alamat'        => 'Jl. Raya No. 1',
            'phone'         => '08123456789',
        ]);

        $this->actingAs($this->dosen, 'dosen')
            ->get(route('detail.index'))
            ->assertStatus(200);
    }

    // -------------------------------------------------------
    // Create
    // -------------------------------------------------------

    public function test_dosen_can_view_create_detail_form(): void
    {
        $this->actingAs($this->dosen, 'dosen')
            ->get(route('detail.create'))
            ->assertStatus(200);
    }

    // -------------------------------------------------------
    // Store
    // -------------------------------------------------------

    public function test_dosen_can_create_detail(): void
    {
        $response = $this->actingAs($this->dosen, 'dosen')
            ->post(route('detail.store'), [
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '1990-05-15',
                'alamat'        => 'Jl. Raya No. 1, Bandung',
                'phone'         => '08123456789',
                'sinta_id'      => 'S123456',
                'scopus_id'     => null,
                'orchid_id'     => null,
            ]);

        $response->assertRedirect(route('detail.index'));
        $this->assertDatabaseHas('details', [
            'dosen_id'     => $this->dosen->id,
            'tempat_lahir' => 'Bandung',
        ]);
    }

    public function test_store_validates_required_fields(): void
    {
        $this->actingAs($this->dosen, 'dosen')
            ->post(route('detail.store'), [])
            ->assertSessionHasErrors(['tempat_lahir', 'tanggal_lahir', 'alamat', 'phone']);
    }

    public function test_store_validates_tanggal_lahir_format(): void
    {
        $this->actingAs($this->dosen, 'dosen')
            ->post(route('detail.store'), [
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => 'bukan-tanggal',
                'alamat'        => 'Jl. Raya No. 1',
                'phone'         => '08123456789',
            ])
            ->assertSessionHasErrors('tanggal_lahir');
    }

    public function test_store_saves_dosen_id_automatically(): void
    {
        $this->actingAs($this->dosen, 'dosen')
            ->post(route('detail.store'), [
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '1985-03-20',
                'alamat'        => 'Jl. Sudirman No. 5',
                'phone'         => '0811111111',
            ]);

        $this->assertDatabaseHas('details', [
            'dosen_id'     => $this->dosen->id,
            'tempat_lahir' => 'Jakarta',
        ]);
    }

    // -------------------------------------------------------
    // Edit & Update
    // -------------------------------------------------------

    public function test_dosen_can_view_edit_detail_form(): void
    {
        $detail = Detail::create([
            'dosen_id'      => $this->dosen->id,
            'tempat_lahir'  => 'Bandung',
            'tanggal_lahir' => '1990-01-01',
            'alamat'        => 'Jl. Raya No. 1',
            'phone'         => '08123456789',
        ]);

        $this->actingAs($this->dosen, 'dosen')
            ->get(route('detail.edit', $detail))
            ->assertStatus(200);
    }

    public function test_dosen_can_update_detail(): void
    {
        $detail = Detail::create([
            'dosen_id'      => $this->dosen->id,
            'tempat_lahir'  => 'Bandung',
            'tanggal_lahir' => '1990-01-01',
            'alamat'        => 'Jl. Lama',
            'phone'         => '08123456789',
        ]);

        $response = $this->actingAs($this->dosen, 'dosen')
            ->put(route('detail.update', $detail), [
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '1990-01-01',
                'alamat'        => 'Jl. Baru No. 99',
            ]);

        $response->assertRedirect(route('detail.index'));
        $this->assertDatabaseHas('details', [
            'id'           => $detail->id,
            'tempat_lahir' => 'Surabaya',
            'alamat'       => 'Jl. Baru No. 99',
        ]);
    }

    public function test_update_validates_required_fields(): void
    {
        $detail = Detail::create([
            'dosen_id'      => $this->dosen->id,
            'tempat_lahir'  => 'Bandung',
            'tanggal_lahir' => '1990-01-01',
            'alamat'        => 'Jl. Raya No. 1',
            'phone'         => '08123456789',
        ]);

        $this->actingAs($this->dosen, 'dosen')
            ->put(route('detail.update', $detail), [])
            ->assertSessionHasErrors(['tempat_lahir', 'tanggal_lahir', 'alamat']);
    }

    // -------------------------------------------------------
    // Guard
    // -------------------------------------------------------

    public function test_guest_cannot_access_detail_routes(): void
    {
        $this->get(route('detail.index'))->assertRedirect('/dosen/login');
        $this->get(route('detail.create'))->assertRedirect('/dosen/login');
    }
}
