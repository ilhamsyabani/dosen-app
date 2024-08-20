@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box p-4" style="background-color: #FBEDD9;">
                            <div class="m-1">
                                <div class="svg-container">
                                    <svg width="52" height="58" viewBox="0 0 52 58" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 1.3094C24.4752 -0.119662 27.5248 -0.119661 30 1.3094L47.9808 11.6906C50.456 13.1197 51.9808 15.7607 51.9808 18.6188V39.3812C51.9808 42.2393 50.456 44.8803 47.9808 46.3094L30 56.6906C27.5248 58.1197 24.4752 58.1197 22 56.6906L4.01924 46.3094C1.54403 44.8803 0.0192375 42.2393 0.0192375 39.3812V18.6188C0.0192375 15.7607 1.54403 13.1197 4.01924 11.6906L22 1.3094Z"
                                            fill="#FFA429" />
                                    </svg>
                                    <i class="icon bi bi-bookmark-check-fill"></i>
                                </div>
                            </div>
                            <h6>Penelitian</h6>
                            <p>57</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box text-center p-4" style="background-color: #DFEDF7;">
                            <div class="m-1">
                                <div class="svg-container">
                                    <svg width="52" height="58" viewBox="0 0 52 58" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 1.3094C24.4752 -0.119662 27.5248 -0.119661 30 1.3094L47.9808 11.6906C50.456 13.1197 51.9808 15.7607 51.9808 18.6188V39.3812C51.9808 42.2393 50.456 44.8803 47.9808 46.3094L30 56.6906C27.5248 58.1197 24.4752 58.1197 22 56.6906L4.01924 46.3094C1.54403 44.8803 0.0192375 42.2393 0.0192375 39.3812V18.6188C0.0192375 15.7607 1.54403 13.1197 4.01924 11.6906L22 1.3094Z"
                                            fill="#1889E3" />
                                    </svg>
                                    <i class="icon bi bi-clipboard2-heart-fill"></i>
                                </div>
                            </div>
                            <h6>Pengabdian</h6>
                            <p>89</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box text-center p-4" style="background-color: #F9E5EA; ">
                            <div class="m-1">
                                <div class="svg-container">
                                    <svg width="52" height="58" viewBox="0 0 52 58" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 1.3094C24.4752 -0.119662 27.5248 -0.119661 30 1.3094L47.9808 11.6906C50.456 13.1197 51.9808 15.7607 51.9808 18.6188V39.3812C51.9808 42.2393 50.456 44.8803 47.9808 46.3094L30 56.6906C27.5248 58.1197 24.4752 58.1197 22 56.6906L4.01924 46.3094C1.54403 44.8803 0.0192375 42.2393 0.0192375 39.3812V18.6188C0.0192375 15.7607 1.54403 13.1197 4.01924 11.6906L22 1.3094Z"
                                            fill="#EF2754" />
                                    </svg>
                                    <i class="icon bi bi-file-earmark-fill"></i>
                                </div>
                            </div>
                            <h6>Perkuliahan</h6>
                            <p>134</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box text-center p-4" style="background-color: #E7E6FB; border-radius:8px;">
                            <div class="m-1">
                                <div class="svg-container">
                                    <svg width="52" height="58" viewBox="0 0 52 58" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 1.3094C24.4752 -0.119662 27.5248 -0.119661 30 1.3094L47.9808 11.6906C50.456 13.1197 51.9808 15.7607 51.9808 18.6188V39.3812C51.9808 42.2393 50.456 44.8803 47.9808 46.3094L30 56.6906C27.5248 58.1197 24.4752 58.1197 22 56.6906L4.01924 46.3094C1.54403 44.8803 0.0192375 42.2393 0.0192375 39.3812V18.6188C0.0192375 15.7607 1.54403 13.1197 4.01924 11.6906L22 1.3094Z"
                                            fill="#5F4FFB" />
                                    </svg>
                                    <i class="icon bi bi-file-earmark-arrow-up-fill"></i>
                                </div>
                            </div>
                            <h6>Publikasi</h6>
                            <p>129</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    {{-- <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Online Store Visitors</h3> <a href="javascript:void(0);"
                                        class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View
                                        Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column"> <span class="fw-bold fs-5">820</span> <span>Visitors Over
                                            Time</span> </p>
                                    <p class="ms-auto d-flex flex-column text-end"> <span class="text-success"> <i
                                                class="bi bi-arrow-up"></i> 12.5%
                                        </span> <span class="text-secondary">Since last week</span> </p>
                                </div> <!-- /.d-flex -->
                                <div class="position-relative mb-4">
                                    <div id="visitors-chart"></div>
                                </div>
                                <div class="d-flex flex-row justify-content-end"> <span class="me-2"> <i
                                            class="bi bi-square-fill text-primary"></i> This Week
                                    </span> <span> <i class="bi bi-square-fill text-secondary"></i> Last Week
                                    </span> </div>
                            </div>
                        </div> <!-- /.card -->
                        <div class="card mb-4">
                            <div class="card-header border-0">
                                <h3 class="card-title">Products</h3>
                                <div class="card-tools"> <a href="#" class="btn btn-tool btn-sm"> <i
                                            class="bi bi-download"></i> </a> <a href="#" class="btn btn-tool btn-sm">
                                        <i class="bi bi-list"></i> </a> </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped align-middle">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Sales</th>
                                            <th>More</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <img src="../../dist/assets/img/default-150x150.png" alt="Product 1"
                                                    class="rounded-circle img-size-32 me-2">
                                                Some Product
                                            </td>
                                            <td>$13 USD</td>
                                            <td> <small class="text-success me-1"> <i class="bi bi-arrow-up"></i>
                                                    12%
                                                </small>
                                                12,000 Sold
                                            </td>
                                            <td> <a href="#" class="text-secondary"> <i class="bi bi-search"></i> </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <img src="../../dist/assets/img/default-150x150.png" alt="Product 1"
                                                    class="rounded-circle img-size-32 me-2">
                                                Another Product
                                            </td>
                                            <td>$29 USD</td>
                                            <td> <small class="text-info me-1"> <i class="bi bi-arrow-down"></i>
                                                    0.5%
                                                </small>
                                                123,234 Sold
                                            </td>
                                            <td> <a href="#" class="text-secondary"> <i class="bi bi-search"></i>
                                                </a> </td>
                                        </tr>
                                        <tr>
                                            <td> <img src="../../dist/assets/img/default-150x150.png" alt="Product 1"
                                                    class="rounded-circle img-size-32 me-2">
                                                Amazing Product
                                            </td>
                                            <td>$1,230 USD</td>
                                            <td> <small class="text-danger me-1"> <i class="bi bi-arrow-down"></i>
                                                    3%
                                                </small>
                                                198 Sold
                                            </td>
                                            <td> <a href="#" class="text-secondary"> <i class="bi bi-search"></i>
                                                </a> </td>
                                        </tr>
                                        <tr>
                                            <td> <img src="../../dist/assets/img/default-150x150.png" alt="Product 1"
                                                    class="rounded-circle img-size-32 me-2">
                                                Perfect Item
                                                <span class="badge text-bg-danger">NEW</span>
                                            </td>
                                            <td>$199 USD</td>
                                            <td> <small class="text-success me-1"> <i class="bi bi-arrow-up"></i>
                                                    63%
                                                </small>
                                                87 Sold
                                            </td>
                                            <td> <a href="#" class="text-secondary"> <i class="bi bi-search"></i>
                                                </a> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-md-6 --> --}}
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Laporan Aktivitas</h3> <a href="javascript:void(0);"
                                        class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Buka
                                        Detail</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column"> <span class="fw-bold fs-5">409</span>
                                        <span>Pencapaian</span>
                                    </p>
                                    <p class="ms-auto d-flex flex-column text-end"> <span class="text-success"> <i
                                                class="bi bi-arrow-up"></i> 33.1%
                                        </span> <span class="text-secondary">Dari tahun lalu</span> </p>
                                </div> <!-- /.d-flex -->
                                <div class="position-relative mb-4">
                                    <div id="sales-chart"></div>
                                </div>
                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mx-2"> <i class="bi bi-square-fill" style="color: #FFA429;"></i>
                                        Penelitian </span>
                                    <span class="mx-2"> <i class="bi bi-square-fill" style="color: #1889E3;"></i>
                                        Pengabdian</span>
                                    <span class="mx-2"> <i class="bi bi-square-fill" style="color: #EF2754;"></i>
                                        Pengajaran</span>
                                    <span class="mx-2"> <i class="bi bi-square-fill" style="color: #5F4FFB;"></i>
                                        Publikasi</span>
                                </div>
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col-md-6 -->
                </div>
            </div>
            <div class="col-4">

                <div class="card mb-4" style="border-radius: 12px;">
                    <div class="card-body text-center">
                        <div class="mt-3 mb-4">
                            <div class="avatar d-flex align-items-center justify-content-center">
                                {{ Auth::user()->nama[0] }}
                            </div>
                        </div>
                        <h4 class="mb-2">{{ Auth::user()->nama }}</h4>
                        <p class="text-muted mb-4">{{ Auth::user()->jabatans->nidn_nuptk }}<span class="mx-2">|</span> 
                            <a href="#!">{{ Auth::user()->departemen->nama }}</a>
                        </p>
                        <div class="mb-4">
                            <button type="button" class="btn btn-outline-primary btn-floating">
                                <i class="fab fa-facebook-f fa-lg"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary btn-floating">
                                <i class="fab fa-twitter fa-lg"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary btn-floating">
                                <i class="fab fa-skype fa-lg"></i>
                            </button>
                        </div>
                        <div class="d-flex justify-content-between text-center mt-5 mb-2">
                            <div>
                                <p class="mb-2 h5">4</p>
                                <p class="text-muted mb-0">Penghargaan Nasional</p>
                            </div>
                            <div class="px-3">
                                <p class="mb-2 h5">2</p>
                                <p class="text-muted mb-0">Penghargaan Internasional</p>
                            </div>
                            <div>
                                <p class="mb-2 h5">12</p>
                                <p class="text-muted mb-0">Jurnal Diterbitkan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="calendar">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

    </div>

    <style>
        .box {
            position: relative;

            border-radius: 8px;
            text-align: center;
            padding: 1rem;
        }

        .box .svg-container {
            position: relative;
            display: inline-block;
        }

        .box svg {
            display: block;
        }

        .box .icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #ffffff;
            border-radius: 50%;
            padding: 0.5rem;
        }

        .card {
            background-color: #ffffff !important;
            box-shadow: 0.5px 0.5px 4px #97979747 !important;
            border-radius: 8px !important;
            border: none !important;
        }

        .avatar {
            width: 100px;
            height: 100px;
            font-size: 40px;
            border-radius: 50%;
            background-color: #007bff;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
    </style>
    <style>
        /*! normalize.css v3.0.0 | MIT License | git.io/normalize */

        /**
                 * 1. Set default font family to sans-serif.
                 * 2. Prevent iOS text size adjust after orientation change, without disabling
                 *    user zoom.
                 */

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }


        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        nav,
        section,
        summary {
            display: block;
        }

        /**
                 * 1. Correct `inline-block` display not defined in IE 8/9.
                 * 2. Normalize vertical alignment of `progress` in Chrome, Firefox, and Opera.
                 */

        audio,
        canvas,
        progress,
        video {
            display: inline-block;
            /* 1 */
            vertical-align: baseline;
            /* 2 */
        }

        /**
                 * Prevent modern browsers from displaying `audio` without controls.
                 * Remove excess height in iOS 5 devices.
                 */

        audio:not([controls]) {
            display: none;
            height: 0;
        }

        /**
                 * Address `[hidden]` styling not present in IE 8/9.
                 * Hide the `template` element in IE, Safari, and Firefox < 22.
                 */

        [hidden],
        template {
            display: none;
        }

        /* Links
                 ========================================================================== */

        /**
                 * Remove the gray background color from active links in IE 10.
                 */

        a {
            background: transparent;
        }

        /**
                 * Improve readability when focused and also mouse hovered in all browsers.
                 */

        a:active,
        a:hover {
            outline: 0;
        }

        /* Text-level semantics
                 ========================================================================== */

        /**
                 * Address styling not present in IE 8/9, Safari 5, and Chrome.
                 */

        abbr[title] {
            border-bottom: 1px dotted;
        }

        /**
                 * Address style set to `bolder` in Firefox 4+, Safari 5, and Chrome.
                 */

        b,
        strong {
            font-weight: bold;
        }

        /**
                 * Address styling not present in Safari 5 and Chrome.
                 */

        dfn {
            font-style: italic;
        }

        /**
                 * Address variable `h1` font-size and margin within `section` and `article`
                 * contexts in Firefox 4+, Safari 5, and Chrome.
                 */

        h1 {
            font-size: 2em;
            margin: 0.67em 0;
        }

        /**
                 * Address styling not present in IE 8/9.
                 */

        mark {
            background: #ff0;
            color: #000;
        }

        /**
                 * Address inconsistent and variable font size in all browsers.
                 */

        small {
            font-size: 80%;
        }

        /**
                 * Prevent `sub` and `sup` affecting `line-height` in all browsers.
                 */

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sup {
            top: -0.5em;
        }

        sub {
            bottom: -0.25em;
        }

        /* Embedded content
                 ========================================================================== */

        /**
                 * Remove border when inside `a` element in IE 8/9.
                 */

        img {
            border: 0;
        }

        /**
                 * Correct overflow displayed oddly in IE 9.
                 */

        svg:not(:root) {
            overflow: hidden;
        }

        /* Grouping content
                 ========================================================================== */

        /**
                 * Address margin not present in IE 8/9 and Safari 5.
                 */

        figure {
            margin: 1em 40px;
        }

        /**
                 * Address differences between Firefox and other browsers.
                 */

        hr {
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            height: 0;
        }

        /**
                 * Contain overflow in all browsers.
                 */

        pre {
            overflow: auto;
        }

        /**
                 * Address odd `em`-unit font size rendering in all browsers.
                 */

        code,
        kbd,
        pre,
        samp {
            font-family: monospace, monospace;
            font-size: 1em;
        }

        /* Forms
                 ========================================================================== */

        /**
                 * Known limitation: by default, Chrome and Safari on OS X allow very limited
                 * styling of `select`, unless a `border` property is set.
                 */

        /**
                 * 1. Correct color not being inherited.
                 *    Known issue: affects color of disabled elements.
                 * 2. Correct font properties not being inherited.
                 * 3. Address margins set differently in Firefox 4+, Safari 5, and Chrome.
                 */

        button,
        input,
        optgroup,
        select,
        textarea {
            color: inherit;
            /* 1 */
            font: inherit;
            /* 2 */
            margin: 0;
            /* 3 */
        }

        /**
                 * Address `overflow` set to `hidden` in IE 8/9/10.
                 */

        button {
            overflow: visible;
        }

        /**
                 * Address inconsistent `text-transform` inheritance for `button` and `select`.
                 * All other form control elements do not inherit `text-transform` values.
                 * Correct `button` style inheritance in Firefox, IE 8+, and Opera
                 * Correct `select` style inheritance in Firefox.
                 */

        button,
        select {
            text-transform: none;
        }

        /**
                 * 1. Avoid the WebKit bug in Android 4.0.* where (2) destroys native `audio`
                 *    and `video` controls.
                 * 2. Correct inability to style clickable `input` types in iOS.
                 * 3. Improve usability and consistency of cursor style between image-type
                 *    `input` and others.
                 */

        button,
        html input[type="button"],
        /* 1 */
        input[type="reset"],
        input[type="submit"] {
            -webkit-appearance: button;
            /* 2 */
            cursor: pointer;
            /* 3 */
        }

        /**
                 * Re-set default cursor for disabled elements.
                 */

        button[disabled],
        html input[disabled] {
            cursor: default;
        }

        /**
                 * Remove inner padding and border in Firefox 4+.
                 */

        button::-moz-focus-inner,
        input::-moz-focus-inner {
            border: 0;
            padding: 0;
        }

        /**
                 * Address Firefox 4+ setting `line-height` on `input` using `!important` in
                 * the UA stylesheet.
                 */

        input {
            line-height: normal;
        }

        /**
                 * It's recommended that you don't attempt to style these elements.
                 * Firefox's implementation doesn't respect box-sizing, padding, or width.
                 *
                 * 1. Address box sizing set to `content-box` in IE 8/9/10.
                 * 2. Remove excess padding in IE 8/9/10.
                 */

        input[type="checkbox"],
        input[type="radio"] {
            box-sizing: border-box;
            /* 1 */
            padding: 0;
            /* 2 */
        }

        /**
                 * Fix the cursor style for Chrome's increment/decrement buttons. For certain
                 * `font-size` values of the `input`, it causes the cursor style of the
                 * decrement button to change from `default` to `text`.
                 */

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            height: auto;
        }

        /**
                 * 1. Address `appearance` set to `searchfield` in Safari 5 and Chrome.
                 * 2. Address `box-sizing` set to `border-box` in Safari 5 and Chrome
                 *    (include `-moz` to future-proof).
                 */

        input[type="search"] {
            -webkit-appearance: textfield;
            /* 1 */
            -moz-box-sizing: content-box;
            -webkit-box-sizing: content-box;
            /* 2 */
            box-sizing: content-box;
        }

        /**
                 * Remove inner padding and search cancel button in Safari and Chrome on OS X.
                 * Safari (but not Chrome) clips the cancel button when the search input has
                 * padding (and `textfield` appearance).
                 */

        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        /**
                 * Define consistent border, margin, and padding.
                 */

        fieldset {
            border: 1px solid #c0c0c0;
            margin: 0 2px;
            padding: 0.35em 0.625em 0.75em;
        }

        /**
                 * 1. Correct `color` not being inherited in IE 8/9.
                 * 2. Remove padding so people aren't caught out if they zero out fieldsets.
                 */

        legend {
            border: 0;
            /* 1 */
            padding: 0;
            /* 2 */
        }

        /**
                 * Remove default vertical scrollbar in IE 8/9.
                 */

        textarea {
            overflow: auto;
        }

        /**
                 * Don't inherit the `font-weight` (applied by a rule above).
                 * NOTE: the default cannot safely be changed in Chrome and Safari on OS X.
                 */

        optgroup {
            font-weight: bold;
        }

        /* Tables
                 ========================================================================== */

        /**
                 * Remove most spacing between table cells.
                 */

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        td,
        th {
            padding: 0;
        }

        /*!
                 * Datepicker for Bootstrap
                 *
                 * Copyright 2012 Stefan Petre
                 * Improvements by Andrew Rowls
                 * Licensed under the Apache License v2.0
                 * http://www.apache.org/licenses/LICENSE-2.0
                 *
                 */
        .datepicker {
            padding: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            direction: ltr;
            /*.dow {
                    border-top: 1px solid #ddd !important;
                  }*/
        }

        .datepicker-inline {
            width: 220px;
        }

        .datepicker.datepicker-rtl {
            direction: rtl;
        }

        .datepicker.datepicker-rtl table tr td span {
            float: right;
        }

        .datepicker-dropdown {
            top: 0;
            left: 0;
        }

        .datepicker-dropdown:before {
            content: '';
            display: inline-block;
            border-left: 7px solid transparent;
            border-right: 7px solid transparent;
            border-bottom: 7px solid #ccc;
            border-top: 0;
            border-bottom-color: rgba(0, 0, 0, 0.2);
            position: absolute;
        }

        .datepicker-dropdown:after {
            content: '';
            display: inline-block;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #ffffff;
            border-top: 0;
            position: absolute;
        }

        .datepicker-dropdown.datepicker-orient-left:before {
            left: 6px;
        }

        .datepicker-dropdown.datepicker-orient-left:after {
            left: 7px;
        }

        .datepicker-dropdown.datepicker-orient-right:before {
            right: 6px;
        }

        .datepicker-dropdown.datepicker-orient-right:after {
            right: 7px;
        }

        .datepicker-dropdown.datepicker-orient-top:before {
            top: -7px;
        }

        .datepicker-dropdown.datepicker-orient-top:after {
            top: -6px;
        }

        .datepicker-dropdown.datepicker-orient-bottom:before {
            bottom: -7px;
            border-bottom: 0;
            border-top: 7px solid #999;
        }

        .datepicker-dropdown.datepicker-orient-bottom:after {
            bottom: -6px;
            border-bottom: 0;
            border-top: 6px solid #ffffff;
        }

        .datepicker>div {
            display: none;
        }

        .datepicker.days div.datepicker-days {
            display: block;
        }

        .datepicker.months div.datepicker-months {
            display: block;
        }

        .datepicker.years div.datepicker-years {
            display: block;
        }

        .datepicker table {
            margin: 0;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .datepicker td,
        .datepicker th {
            text-align: center;
            width: 20px;
            height: 40px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            border: none;

            font-size: 13px;
            font-weight: 700;
        }

        .table-striped .datepicker table tr td,
        .table-striped .datepicker table tr th {
            background-color: transparent;
        }

        .datepicker table tr td.day:hover,
        .datepicker table tr td.day.focused {
            background: #eeeeee;
            cursor: pointer;
        }

        .datepicker table tr td.old,
        .datepicker table tr td.new {
            color: #999999;
        }

        .datepicker table tr td.disabled,
        .datepicker table tr td.disabled:hover {
            background: none;
            color: #999999;
            cursor: default;
        }

        .datepicker table tr td.today,
        .datepicker table tr td.today:hover,
        .datepicker table tr td.today.disabled,
        .datepicker table tr td.today.disabled:hover {
            background-color: #fde19a;

            color: #000 !important;
        }

        .datepicker table tr td.today:hover,
        .datepicker table tr td.today:hover:hover,
        .datepicker table tr td.today.disabled:hover,
        .datepicker table tr td.today.disabled:hover:hover,
        .datepicker table tr td.today:active,
        .datepicker table tr td.today:hover:active,
        .datepicker table tr td.today.disabled:active,
        .datepicker table tr td.today.disabled:hover:active,
        .datepicker table tr td.today.active,
        .datepicker table tr td.today:hover.active,
        .datepicker table tr td.today.disabled.active,
        .datepicker table tr td.today.disabled:hover.active,
        .datepicker table tr td.today.disabled,
        .datepicker table tr td.today:hover.disabled,
        .datepicker table tr td.today.disabled.disabled,
        .datepicker table tr td.today.disabled:hover.disabled,
        .datepicker table tr td.today[disabled],
        .datepicker table tr td.today:hover[disabled],
        .datepicker table tr td.today.disabled[disabled],
        .datepicker table tr td.today.disabled:hover[disabled] {
            background-color: #ff8c00;
        }

        .datepicker table tr td.today:active,
        .datepicker table tr td.today:hover:active,
        .datepicker table tr td.today.disabled:active,
        .datepicker table tr td.today.disabled:hover:active,
        .datepicker table tr td.today.active,
        .datepicker table tr td.today:hover.active,
        .datepicker table tr td.today.disabled.active,
        .datepicker table tr td.today.disabled:hover.active {
            background-color: #fbf069 \9;
        }

        .datepicker table tr td.today:hover:hover {
            color: #000;
        }

        .datepicker table tr td.today.active:hover {
            color: #fff;
        }

        .datepicker table tr td.range,
        .datepicker table tr td.range:hover,
        .datepicker table tr td.range.disabled,
        .datepicker table tr td.range.disabled:hover {
            background: #eeeeee;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }

        .datepicker table tr td.range.today,
        .datepicker table tr td.range.today:hover,
        .datepicker table tr td.range.today.disabled,
        .datepicker table tr td.range.today.disabled:hover {
            background-color: #ff8c00;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }

        .datepicker table tr td.range.today:hover,
        .datepicker table tr td.range.today:hover:hover,
        .datepicker table tr td.range.today.disabled:hover,
        .datepicker table tr td.range.today.disabled:hover:hover,
        .datepicker table tr td.range.today:active,
        .datepicker table tr td.range.today:hover:active,
        .datepicker table tr td.range.today.disabled:active,
        .datepicker table tr td.range.today.disabled:hover:active,
        .datepicker table tr td.range.today.active,
        .datepicker table tr td.range.today:hover.active,
        .datepicker table tr td.range.today.disabled.active,
        .datepicker table tr td.range.today.disabled:hover.active,
        .datepicker table tr td.range.today.disabled,
        .datepicker table tr td.range.today:hover.disabled,
        .datepicker table tr td.range.today.disabled.disabled,
        .datepicker table tr td.range.today.disabled:hover.disabled,
        .datepicker table tr td.range.today[disabled],
        .datepicker table tr td.range.today:hover[disabled],
        .datepicker table tr td.range.today.disabled[disabled],
        .datepicker table tr td.range.today.disabled:hover[disabled] {
            background-color: #f3e97a;
        }

        .datepicker table tr td.range.today:active,
        .datepicker table tr td.range.today:hover:active,
        .datepicker table tr td.range.today.disabled:active,
        .datepicker table tr td.range.today.disabled:hover:active,
        .datepicker table tr td.range.today.active,
        .datepicker table tr td.range.today:hover.active,
        .datepicker table tr td.range.today.disabled.active,
        .datepicker table tr td.range.today.disabled:hover.active {
            background-color: #efe24b \9;
        }

        .datepicker table tr td.selected,
        .datepicker table tr td.selected:hover,
        .datepicker table tr td.selected.disabled,
        .datepicker table tr td.selected.disabled:hover {
            background-color: #ff8c00;
            color: #fff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        }

        .datepicker table tr td.selected:hover,
        .datepicker table tr td.selected:hover:hover,
        .datepicker table tr td.selected.disabled:hover,
        .datepicker table tr td.selected.disabled:hover:hover,
        .datepicker table tr td.selected:active,
        .datepicker table tr td.selected:hover:active,
        .datepicker table tr td.selected.disabled:active,
        .datepicker table tr td.selected.disabled:hover:active,
        .datepicker table tr td.selected.active,
        .datepicker table tr td.selected:hover.active,
        .datepicker table tr td.selected.disabled.active,
        .datepicker table tr td.selected.disabled:hover.active,
        .datepicker table tr td.selected.disabled,
        .datepicker table tr td.selected:hover.disabled,
        .datepicker table tr td.selected.disabled.disabled,
        .datepicker table tr td.selected.disabled:hover.disabled,
        .datepicker table tr td.selected[disabled],
        .datepicker table tr td.selected:hover[disabled],
        .datepicker table tr td.selected.disabled[disabled],
        .datepicker table tr td.selected.disabled:hover[disabled] {
            background-color: #808080;
        }

        .datepicker table tr td.selected:active,
        .datepicker table tr td.selected:hover:active,
        .datepicker table tr td.selected.disabled:active,
        .datepicker table tr td.selected.disabled:hover:active,
        .datepicker table tr td.selected.active,
        .datepicker table tr td.selected:hover.active,
        .datepicker table tr td.selected.disabled.active,
        .datepicker table tr td.selected.disabled:hover.active {
            background-color: #666666 \9;
        }

        .datepicker table tr td.active:hover,
        .datepicker table tr td.active:hover:hover,
        .datepicker table tr td.active.disabled:hover,
        .datepicker table tr td.active.disabled:hover:hover,
        .datepicker table tr td.active:active,
        .datepicker table tr td.active:hover:active,
        .datepicker table tr td.active.disabled:active,
        .datepicker table tr td.active.disabled:hover:active,
        .datepicker table tr td.active.active,
        .datepicker table tr td.active:hover.active,
        .datepicker table tr td.active.disabled.active,
        .datepicker table tr td.active.disabled:hover.active,
        .datepicker table tr td.active.disabled,
        .datepicker table tr td.active:hover.disabled,
        .datepicker table tr td.active.disabled.disabled,
        .datepicker table tr td.active.disabled:hover.disabled,
        .datepicker table tr td.active[disabled],
        .datepicker table tr td.active:hover[disabled],
        .datepicker table tr td.active.disabled[disabled],
        .datepicker table tr td.active.disabled:hover[disabled] {
            background-color: #ff8c00;

            color: #fff !important;
        }

        .datepicker table tr td.active:active,
        .datepicker table tr td.active:hover:active,
        .datepicker table tr td.active.disabled:active,
        .datepicker table tr td.active.disabled:hover:active,
        .datepicker table tr td.active.active,
        .datepicker table tr td.active:hover.active,
        .datepicker table tr td.active.disabled.active,
        .datepicker table tr td.active.disabled:hover.active {
            background-color: #003399 \9;
        }

        .datepicker table tr td span {
            display: block;
            width: 23%;
            height: 54px;
            line-height: 54px;
            float: left;
            margin: 1%;
            cursor: pointer;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .datepicker table tr td span:hover {
            background: #eeeeee;
        }

        .datepicker table tr td span.disabled,
        .datepicker table tr td span.disabled:hover {
            background: none;
            color: #999999;
            cursor: default;
        }

        .datepicker table tr td span.active,
        .datepicker table tr td span.active:hover,
        .datepicker table tr td span.active.disabled,
        .datepicker table tr td span.active.disabled:hover {
            background-color: #ff8c00;
            color: #fff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        }

        .datepicker table tr td span.active:hover,
        .datepicker table tr td span.active:hover:hover,
        .datepicker table tr td span.active.disabled:hover,
        .datepicker table tr td span.active.disabled:hover:hover,
        .datepicker table tr td span.active:active,
        .datepicker table tr td span.active:hover:active,
        .datepicker table tr td span.active.disabled:active,
        .datepicker table tr td span.active.disabled:hover:active,
        .datepicker table tr td span.active.active,
        .datepicker table tr td span.active:hover.active,
        .datepicker table tr td span.active.disabled.active,
        .datepicker table tr td span.active.disabled:hover.active,
        .datepicker table tr td span.active.disabled,
        .datepicker table tr td span.active:hover.disabled,
        .datepicker table tr td span.active.disabled.disabled,
        .datepicker table tr td span.active.disabled:hover.disabled,
        .datepicker table tr td span.active[disabled],
        .datepicker table tr td span.active:hover[disabled],
        .datepicker table tr td span.active.disabled[disabled],
        .datepicker table tr td span.active.disabled:hover[disabled] {
            background-color: ##ff8c00;
        }

        .datepicker table tr td span.active:active,
        .datepicker table tr td span.active:hover:active,
        .datepicker table tr td span.active.disabled:active,
        .datepicker table tr td span.active.disabled:hover:active,
        .datepicker table tr td span.active.active,
        .datepicker table tr td span.active:hover.active,
        .datepicker table tr td span.active.disabled.active,
        .datepicker table tr td span.active.disabled:hover.active {
            background-color: #003399 \9;
        }

        .datepicker table tr td span.old,
        .datepicker table tr td span.new {
            color: #999999;
        }

        .datepicker th.datepicker-switch {
            width: 145px;
        }

        .datepicker thead tr:first-child th,
        .datepicker tfoot tr th {
            cursor: pointer;

            color: #ff8c00;
        }

        .datepicker thead tr:first-child th:hover,
        .datepicker tfoot tr th:hover {
            background: #eeeeee;
        }

        .datepicker .cw {
            font-size: 10px;
            width: 12px;
            padding: 0 2px 0 5px;
            vertical-align: middle;
        }

        .datepicker thead tr:first-child th.cw {
            cursor: default;
            background-color: transparent;
        }

        .input-append.date .add-on i,
        .input-prepend.date .add-on i {
            cursor: pointer;
            width: 16px;
            height: 16px;
        }

        .input-daterange input {
            text-align: center;
        }

        .input-daterange input:first-child {
            -webkit-border-radius: 3px 0 0 3px;
            -moz-border-radius: 3px 0 0 3px;
            border-radius: 3px 0 0 3px;
        }

        .input-daterange input:last-child {
            -webkit-border-radius: 0 3px 3px 0;
            -moz-border-radius: 0 3px 3px 0;
            border-radius: 0 3px 3px 0;
        }

        .input-daterange .add-on {
            display: inline-block;
            width: auto;
            min-width: 16px;
            height: 20px;
            padding: 4px 5px;
            font-weight: normal;
            line-height: 20px;
            text-align: center;
            text-shadow: 0 1px 0 #ffffff;
            vertical-align: middle;
            background-color: #eeeeee;
            border: 1px solid #ccc;
            margin-left: -5px;
            margin-right: -5px;
        }

        .datepicker.dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            float: left;
            display: none;
            min-width: 160px;
            list-style: none;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            *border-right-width: 2px;
            *border-bottom-width: 2px;
            color: #333333;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 13px;
            line-height: 20px;
        }

        .datepicker.dropdown-menu th,
        .datepicker.datepicker-inline th,
        .datepicker.dropdown-menu td,
        .datepicker.datepicker-inline td {
            padding: 4px 5px;
        }

        .datepicker .dow {

            border-bottom: 1px solid #e7e7e7;

            color: #9b8079;
            font-size: 13px;
        }

        .datepicker-months .prev,
        .datapicker-months .next,
        .datepicker-years .prev,
        .datepicker-years .next {
            width: 58px;
        }

        .datepicker-days tbody td:nth-child(6),
        .datepicker-days tbody td:nth-child(7) {
            color: #D44;
        }

        @import url("normalize.css");
        @import url("datepicker.css");

        /* app */
        .charset {
            box-shadow: 1px 1px 10px #000;
        }



        .app__main {
            background: #fbf9fa;
            width: 65%;
            height: 100%;
            float: left;
            padding: 40px;
        }



        /* b-calendar */
        .calendar {
            padding: 0px 24px 24px 24px;
            background-color: #ffffff;
            box-shadow: 1px 1px 8px #97979747;
            border-radius: 8px;
        }

        .calendar .datepicker {
            width: 100%;
        }

        .calendar .datepicker table {
            width: 100%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
    <script>
        // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
        // IT'S ALL JUST JUNK FOR DEMO
        // ++++++++++++++++++++++++++++++++++++++++++

        const visitors_chart_options = {
            series: [{
                    name: "High - 2023",
                    data: [100, 120, 170, 167, 180, 177, 160],
                },
                {
                    name: "Low - 2023",
                    data: [60, 80, 70, 67, 80, 77, 100],
                },
            ],
            chart: {
                height: 200,
                type: "line",
                toolbar: {
                    show: false,
                },
            },
            colors: ["#0d6efd", "#adb5bd"],
            stroke: {
                curve: "smooth",
            },
            grid: {
                borderColor: "#e7e7e7",
                row: {
                    colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                    opacity: 0.5,
                },
            },
            legend: {
                show: false,
            },
            markers: {
                size: 1,
            },
            xaxis: {
                categories: ["22th", "23th", "24th", "25th", "26th", "27th", "28th"],
            },
        };

        const visitors_chart = new ApexCharts(
            document.querySelector("#visitors-chart"),
            visitors_chart_options
        );
        visitors_chart.render();

        const sales_chart_options = {
            series: [{
                    name: "Penelitian",
                    data: [4, 5, 7, 6, 1, 8, 13, 6, 16],
                },
                {
                    name: "Pengabdian",
                    data: [16, 5, 11, 8, 17, 15, 21, 11, 4],
                },
                {
                    name: "Perkuliahan",
                    data: [15, 11, 12, 6, 4, 18, 12, 12, 8],
                },
                {
                    name: "Publikasi",
                    data: [15, 11, 12, 16, 8, 18, 12, 9, 11],
                },
            ],
            chart: {
                type: "bar",
                height: 320,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "55%",
                    endingShape: "rounded",
                },
            },
            legend: {
                show: false,
            },
            colors: ["#FFA429", "#1889E3", "#EF2754", "#5F4FFB"],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            xaxis: {
                categories: [
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                ],
            },
            fill: {
                opacity: 1,
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands";
                    },
                },
            },
        };

        const sales_chart = new ApexCharts(
            document.querySelector("#sales-chart"),
            sales_chart_options
        );
        sales_chart.render();
    </script>
    <script>
        /* =========================================================
         * bootstrap-datepicker.js
         * Repo: https://github.com/eternicode/bootstrap-datepicker/
         * Demo: https://eternicode.github.io/bootstrap-datepicker/
         * Docs: http://bootstrap-datepicker.readthedocs.org/
         * Forked from http://www.eyecon.ro/bootstrap-datepicker
         * =========================================================
         * Started by Stefan Petre; improvements by Andrew Rowls + contributors
         *
         * Licensed under the Apache License, Version 2.0 (the "License");
         * you may not use this file except in compliance with the License.
         * You may obtain a copy of the License at
         *
         * http://www.apache.org/licenses/LICENSE-2.0
         *
         * Unless required by applicable law or agreed to in writing, software
         * distributed under the License is distributed on an "AS IS" BASIS,
         * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
         * See the License for the specific language governing permissions and
         * limitations under the License.
         * ========================================================= */

        (function($, undefined) {

            var $window = $(window);

            function UTCDate() {
                return new Date(Date.UTC.apply(Date, arguments));
            }

            function UTCToday() {
                var today = new Date();
                return UTCDate(today.getFullYear(), today.getMonth(), today.getDate());
            }

            function alias(method) {
                return function() {
                    return this[method].apply(this, arguments);
                };
            }

            var DateArray = (function() {
                var extras = {
                    get: function(i) {
                        return this.slice(i)[0];
                    },
                    contains: function(d) {
                        // Array.indexOf is not cross-browser;
                        // $.inArray doesn't work with Dates
                        var val = d && d.valueOf();
                        for (var i = 0, l = this.length; i < l; i++)
                            if (this[i].valueOf() === val)
                                return i;
                        return -1;
                    },
                    remove: function(i) {
                        this.splice(i, 1);
                    },
                    replace: function(new_array) {
                        if (!new_array)
                            return;
                        if (!$.isArray(new_array))
                            new_array = [new_array];
                        this.clear();
                        this.push.apply(this, new_array);
                    },
                    clear: function() {
                        this.length = 0;
                    },
                    copy: function() {
                        var a = new DateArray();
                        a.replace(this);
                        return a;
                    }
                };

                return function() {
                    var a = [];
                    a.push.apply(a, arguments);
                    $.extend(a, extras);
                    return a;
                };
            })();


            // Picker object

            var Datepicker = function(element, options) {
                this.dates = new DateArray();
                this.viewDate = UTCToday();
                this.focusDate = null;

                this._process_options(options);

                this.element = $(element);
                this.isInline = false;
                this.isInput = this.element.is('input');
                this.component = this.element.is('.date') ? this.element.find('.add-on, .input-group-addon, .btn') :
                    false;
                this.hasInput = this.component && this.element.find('input').length;
                if (this.component && this.component.length === 0)
                    this.component = false;

                this.picker = $(DPGlobal.template);
                this._buildEvents();
                this._attachEvents();

                if (this.isInline) {
                    this.picker.addClass('datepicker-inline').appendTo(this.element);
                } else {
                    this.picker.addClass('datepicker-dropdown dropdown-menu');
                }

                if (this.o.rtl) {
                    this.picker.addClass('datepicker-rtl');
                }

                this.viewMode = this.o.startView;

                if (this.o.calendarWeeks)
                    this.picker.find('tfoot th.today')
                    .attr('colspan', function(i, val) {
                        return parseInt(val) + 1;
                    });

                this._allow_update = false;

                this.setStartDate(this._o.startDate);
                this.setEndDate(this._o.endDate);
                this.setDaysOfWeekDisabled(this.o.daysOfWeekDisabled);

                this.fillDow();
                this.fillMonths();

                this._allow_update = true;

                this.update();
                this.showMode();

                if (this.isInline) {
                    this.show();
                }
            };

            Datepicker.prototype = {
                constructor: Datepicker,

                _process_options: function(opts) {
                    // Store raw options for reference
                    this._o = $.extend({}, this._o, opts);
                    // Processed options
                    var o = this.o = $.extend({}, this._o);

                    // Check if "de-DE" style date is available, if not language should
                    // fallback to 2 letter code eg "de"
                    var lang = o.language;
                    if (!dates[lang]) {
                        lang = lang.split('-')[0];
                        if (!dates[lang])
                            lang = defaults.language;
                    }
                    o.language = lang;

                    switch (o.startView) {
                        case 2:
                        case 'decade':
                            o.startView = 2;
                            break;
                        case 1:
                        case 'year':
                            o.startView = 1;
                            break;
                        default:
                            o.startView = 0;
                    }

                    switch (o.minViewMode) {
                        case 1:
                        case 'months':
                            o.minViewMode = 1;
                            break;
                        case 2:
                        case 'years':
                            o.minViewMode = 2;
                            break;
                        default:
                            o.minViewMode = 0;
                    }

                    o.startView = Math.max(o.startView, o.minViewMode);

                    // true, false, or Number > 0
                    if (o.multidate !== true) {
                        o.multidate = Number(o.multidate) || false;
                        if (o.multidate !== false)
                            o.multidate = Math.max(0, o.multidate);
                        else
                            o.multidate = 1;
                    }
                    o.multidateSeparator = String(o.multidateSeparator);

                    o.weekStart %= 7;
                    o.weekEnd = ((o.weekStart + 6) % 7);

                    var format = DPGlobal.parseFormat(o.format);
                    if (o.startDate !== -Infinity) {
                        if (!!o.startDate) {
                            if (o.startDate instanceof Date)
                                o.startDate = this._local_to_utc(this._zero_time(o.startDate));
                            else
                                o.startDate = DPGlobal.parseDate(o.startDate, format, o.language);
                        } else {
                            o.startDate = -Infinity;
                        }
                    }
                    if (o.endDate !== Infinity) {
                        if (!!o.endDate) {
                            if (o.endDate instanceof Date)
                                o.endDate = this._local_to_utc(this._zero_time(o.endDate));
                            else
                                o.endDate = DPGlobal.parseDate(o.endDate, format, o.language);
                        } else {
                            o.endDate = Infinity;
                        }
                    }

                    o.daysOfWeekDisabled = o.daysOfWeekDisabled || [];
                    if (!$.isArray(o.daysOfWeekDisabled))
                        o.daysOfWeekDisabled = o.daysOfWeekDisabled.split(/[,\s]*/);
                    o.daysOfWeekDisabled = $.map(o.daysOfWeekDisabled, function(d) {
                        return parseInt(d, 10);
                    });

                    var plc = String(o.orientation).toLowerCase().split(/\s+/g),
                        _plc = o.orientation.toLowerCase();
                    plc = $.grep(plc, function(word) {
                        return (/^auto|left|right|top|bottom$/).test(word);
                    });
                    o.orientation = {
                        x: 'auto',
                        y: 'auto'
                    };
                    if (!_plc || _plc === 'auto')
                    ; // no action
                    else if (plc.length === 1) {
                        switch (plc[0]) {
                            case 'top':
                            case 'bottom':
                                o.orientation.y = plc[0];
                                break;
                            case 'left':
                            case 'right':
                                o.orientation.x = plc[0];
                                break;
                        }
                    } else {
                        _plc = $.grep(plc, function(word) {
                            return (/^left|right$/).test(word);
                        });
                        o.orientation.x = _plc[0] || 'auto';

                        _plc = $.grep(plc, function(word) {
                            return (/^top|bottom$/).test(word);
                        });
                        o.orientation.y = _plc[0] || 'auto';
                    }
                },
                _events: [],
                _secondaryEvents: [],
                _applyEvents: function(evs) {
                    for (var i = 0, el, ch, ev; i < evs.length; i++) {
                        el = evs[i][0];
                        if (evs[i].length === 2) {
                            ch = undefined;
                            ev = evs[i][1];
                        } else if (evs[i].length === 3) {
                            ch = evs[i][1];
                            ev = evs[i][2];
                        }
                        el.on(ev, ch);
                    }
                },
                _unapplyEvents: function(evs) {
                    for (var i = 0, el, ev, ch; i < evs.length; i++) {
                        el = evs[i][0];
                        if (evs[i].length === 2) {
                            ch = undefined;
                            ev = evs[i][1];
                        } else if (evs[i].length === 3) {
                            ch = evs[i][1];
                            ev = evs[i][2];
                        }
                        el.off(ev, ch);
                    }
                },
                _buildEvents: function() {
                    if (this.isInput) { // single input
                        this._events = [
                            [this.element, {
                                focus: $.proxy(this.show, this),
                                keyup: $.proxy(function(e) {
                                    if ($.inArray(e.keyCode, [27, 37, 39, 38, 40, 32, 13,
                                            9
                                        ]) === -1)
                                        this.update();
                                }, this),
                                keydown: $.proxy(this.keydown, this)
                            }]
                        ];
                    } else if (this.component && this.hasInput) { // component: input + button
                        this._events = [
                            // For components that are not readonly, allow keyboard nav
                            [this.element.find('input'), {
                                focus: $.proxy(this.show, this),
                                keyup: $.proxy(function(e) {
                                    if ($.inArray(e.keyCode, [27, 37, 39, 38, 40, 32, 13,
                                            9
                                        ]) === -1)
                                        this.update();
                                }, this),
                                keydown: $.proxy(this.keydown, this)
                            }],
                            [this.component, {
                                click: $.proxy(this.show, this)
                            }]
                        ];
                    } else if (this.element.is('div')) { // inline datepicker
                        this.isInline = true;
                    } else {
                        this._events = [
                            [this.element, {
                                click: $.proxy(this.show, this)
                            }]
                        ];
                    }
                    this._events.push(
                        // Component: listen for blur on element descendants
                        [this.element, '*', {
                            blur: $.proxy(function(e) {
                                this._focused_from = e.target;
                            }, this)
                        }],
                        // Input: listen for blur on element
                        [this.element, {
                            blur: $.proxy(function(e) {
                                this._focused_from = e.target;
                            }, this)
                        }]
                    );

                    this._secondaryEvents = [
                        [this.picker, {
                            click: $.proxy(this.click, this)
                        }],
                        [$(window), {
                            resize: $.proxy(this.place, this)
                        }],
                        [$(document), {
                            'mousedown touchstart': $.proxy(function(e) {
                                // Clicked outside the datepicker, hide it
                                if (!(
                                        this.element.is(e.target) ||
                                        this.element.find(e.target).length ||
                                        this.picker.is(e.target) ||
                                        this.picker.find(e.target).length
                                    )) {
                                    this.hide();
                                }
                            }, this)
                        }]
                    ];
                },
                _attachEvents: function() {
                    this._detachEvents();
                    this._applyEvents(this._events);
                },
                _detachEvents: function() {
                    this._unapplyEvents(this._events);
                },
                _attachSecondaryEvents: function() {
                    this._detachSecondaryEvents();
                    this._applyEvents(this._secondaryEvents);
                },
                _detachSecondaryEvents: function() {
                    this._unapplyEvents(this._secondaryEvents);
                },
                _trigger: function(event, altdate) {
                    var date = altdate || this.dates.get(-1),
                        local_date = this._utc_to_local(date);

                    this.element.trigger({
                        type: event,
                        date: local_date,
                        dates: $.map(this.dates, this._utc_to_local),
                        format: $.proxy(function(ix, format) {
                            if (arguments.length === 0) {
                                ix = this.dates.length - 1;
                                format = this.o.format;
                            } else if (typeof ix === 'string') {
                                format = ix;
                                ix = this.dates.length - 1;
                            }
                            format = format || this.o.format;
                            var date = this.dates.get(ix);
                            return DPGlobal.formatDate(date, format, this.o.language);
                        }, this)
                    });
                },

                show: function() {
                    if (!this.isInline)
                        this.picker.appendTo('body');
                    this.picker.show();
                    this.place();
                    this._attachSecondaryEvents();
                    this._trigger('show');
                },

                hide: function() {
                    if (this.isInline)
                        return;
                    if (!this.picker.is(':visible'))
                        return;
                    this.focusDate = null;
                    this.picker.hide().detach();
                    this._detachSecondaryEvents();
                    this.viewMode = this.o.startView;
                    this.showMode();

                    if (
                        this.o.forceParse &&
                        (
                            this.isInput && this.element.val() ||
                            this.hasInput && this.element.find('input').val()
                        )
                    )
                        this.setValue();
                    this._trigger('hide');
                },

                remove: function() {
                    this.hide();
                    this._detachEvents();
                    this._detachSecondaryEvents();
                    this.picker.remove();
                    delete this.element.data().datepicker;
                    if (!this.isInput) {
                        delete this.element.data().date;
                    }
                },

                _utc_to_local: function(utc) {
                    return utc && new Date(utc.getTime() + (utc.getTimezoneOffset() * 60000));
                },
                _local_to_utc: function(local) {
                    return local && new Date(local.getTime() - (local.getTimezoneOffset() * 60000));
                },
                _zero_time: function(local) {
                    return local && new Date(local.getFullYear(), local.getMonth(), local.getDate());
                },
                _zero_utc_time: function(utc) {
                    return utc && new Date(Date.UTC(utc.getUTCFullYear(), utc.getUTCMonth(), utc.getUTCDate()));
                },

                getDates: function() {
                    return $.map(this.dates, this._utc_to_local);
                },

                getUTCDates: function() {
                    return $.map(this.dates, function(d) {
                        return new Date(d);
                    });
                },

                getDate: function() {
                    return this._utc_to_local(this.getUTCDate());
                },

                getUTCDate: function() {
                    return new Date(this.dates.get(-1));
                },

                setDates: function() {
                    var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
                    this.update.apply(this, args);
                    this._trigger('changeDate');
                    this.setValue();
                },

                setUTCDates: function() {
                    var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
                    this.update.apply(this, $.map(args, this._utc_to_local));
                    this._trigger('changeDate');
                    this.setValue();
                },

                setDate: alias('setDates'),
                setUTCDate: alias('setUTCDates'),

                setValue: function() {
                    var formatted = this.getFormattedDate();
                    if (!this.isInput) {
                        if (this.component) {
                            this.element.find('input').val(formatted).change();
                        }
                    } else {
                        this.element.val(formatted).change();
                    }
                },

                getFormattedDate: function(format) {
                    if (format === undefined)
                        format = this.o.format;

                    var lang = this.o.language;
                    return $.map(this.dates, function(d) {
                        return DPGlobal.formatDate(d, format, lang);
                    }).join(this.o.multidateSeparator);
                },

                setStartDate: function(startDate) {
                    this._process_options({
                        startDate: startDate
                    });
                    this.update();
                    this.updateNavArrows();
                },

                setEndDate: function(endDate) {
                    this._process_options({
                        endDate: endDate
                    });
                    this.update();
                    this.updateNavArrows();
                },

                setDaysOfWeekDisabled: function(daysOfWeekDisabled) {
                    this._process_options({
                        daysOfWeekDisabled: daysOfWeekDisabled
                    });
                    this.update();
                    this.updateNavArrows();
                },

                place: function() {
                    if (this.isInline)
                        return;
                    var calendarWidth = this.picker.outerWidth(),
                        calendarHeight = this.picker.outerHeight(),
                        visualPadding = 10,
                        windowWidth = $window.width(),
                        windowHeight = $window.height(),
                        scrollTop = $window.scrollTop();

                    var zIndex = parseInt(this.element.parents().filter(function() {
                        return $(this).css('z-index') !== 'auto';
                    }).first().css('z-index')) + 10;
                    var offset = this.component ? this.component.parent().offset() : this.element.offset();
                    var height = this.component ? this.component.outerHeight(true) : this.element.outerHeight(
                        false);
                    var width = this.component ? this.component.outerWidth(true) : this.element.outerWidth(
                        false);
                    var left = offset.left,
                        top = offset.top;

                    this.picker.removeClass(
                        'datepicker-orient-top datepicker-orient-bottom ' +
                        'datepicker-orient-right datepicker-orient-left'
                    );

                    if (this.o.orientation.x !== 'auto') {
                        this.picker.addClass('datepicker-orient-' + this.o.orientation.x);
                        if (this.o.orientation.x === 'right')
                            left -= calendarWidth - width;
                    }
                    // auto x orientation is best-placement: if it crosses a window
                    // edge, fudge it sideways
                    else {
                        // Default to left
                        this.picker.addClass('datepicker-orient-left');
                        if (offset.left < 0)
                            left -= offset.left - visualPadding;
                        else if (offset.left + calendarWidth > windowWidth)
                            left = windowWidth - calendarWidth - visualPadding;
                    }

                    // auto y orientation is best-situation: top or bottom, no fudging,
                    // decision based on which shows more of the calendar
                    var yorient = this.o.orientation.y,
                        top_overflow, bottom_overflow;
                    if (yorient === 'auto') {
                        top_overflow = -scrollTop + offset.top - calendarHeight;
                        bottom_overflow = scrollTop + windowHeight - (offset.top + height + calendarHeight);
                        if (Math.max(top_overflow, bottom_overflow) === bottom_overflow)
                            yorient = 'top';
                        else
                            yorient = 'bottom';
                    }
                    this.picker.addClass('datepicker-orient-' + yorient);
                    if (yorient === 'top')
                        top += height;
                    else
                        top -= calendarHeight + parseInt(this.picker.css('padding-top'));

                    this.picker.css({
                        top: top,
                        left: left,
                        zIndex: zIndex
                    });
                },

                _allow_update: true,
                update: function() {
                    if (!this._allow_update)
                        return;

                    var oldDates = this.dates.copy(),
                        dates = [],
                        fromArgs = false;
                    if (arguments.length) {
                        $.each(arguments, $.proxy(function(i, date) {
                            if (date instanceof Date)
                                date = this._local_to_utc(date);
                            dates.push(date);
                        }, this));
                        fromArgs = true;
                    } else {
                        dates = this.isInput ?
                            this.element.val() :
                            this.element.data('date') || this.element.find('input').val();
                        if (dates && this.o.multidate)
                            dates = dates.split(this.o.multidateSeparator);
                        else
                            dates = [dates];
                        delete this.element.data().date;
                    }

                    dates = $.map(dates, $.proxy(function(date) {
                        return DPGlobal.parseDate(date, this.o.format, this.o.language);
                    }, this));
                    dates = $.grep(dates, $.proxy(function(date) {
                        return (
                            date < this.o.startDate ||
                            date > this.o.endDate ||
                            !date
                        );
                    }, this), true);
                    this.dates.replace(dates);

                    if (this.dates.length)
                        this.viewDate = new Date(this.dates.get(-1));
                    else if (this.viewDate < this.o.startDate)
                        this.viewDate = new Date(this.o.startDate);
                    else if (this.viewDate > this.o.endDate)
                        this.viewDate = new Date(this.o.endDate);

                    if (fromArgs) {
                        // setting date by clicking
                        this.setValue();
                    } else if (dates.length) {
                        // setting date by typing
                        if (String(oldDates) !== String(this.dates))
                            this._trigger('changeDate');
                    }
                    if (!this.dates.length && oldDates.length)
                        this._trigger('clearDate');

                    this.fill();
                },

                fillDow: function() {
                    var dowCnt = this.o.weekStart,
                        html = '<tr>';
                    if (this.o.calendarWeeks) {
                        var cell = '<th class="cw">&nbsp;</th>';
                        html += cell;
                        this.picker.find('.datepicker-days thead tr:first-child').prepend(cell);
                    }
                    while (dowCnt < this.o.weekStart + 7) {
                        html += '<th class="dow">' + dates[this.o.language].daysMin[(dowCnt++) % 7] + '</th>';
                    }
                    html += '</tr>';
                    this.picker.find('.datepicker-days thead').append(html);
                },

                fillMonths: function() {
                    var html = '',
                        i = 0;
                    while (i < 12) {
                        html += '<span class="month">' + dates[this.o.language].monthsShort[i++] + '</span>';
                    }
                    this.picker.find('.datepicker-months td').html(html);
                },

                setRange: function(range) {
                    if (!range || !range.length)
                        delete this.range;
                    else
                        this.range = $.map(range, function(d) {
                            return d.valueOf();
                        });
                    this.fill();
                },

                getClassNames: function(date) {
                    var cls = [],
                        year = this.viewDate.getUTCFullYear(),
                        month = this.viewDate.getUTCMonth(),
                        today = new Date();
                    if (date.getUTCFullYear() < year || (date.getUTCFullYear() === year && date.getUTCMonth() <
                            month)) {
                        cls.push('old');
                    } else if (date.getUTCFullYear() > year || (date.getUTCFullYear() === year && date
                            .getUTCMonth() > month)) {
                        cls.push('new');
                    }
                    if (this.focusDate && date.valueOf() === this.focusDate.valueOf())
                        cls.push('focused');
                    // Compare internal UTC date with local today, not UTC today
                    if (this.o.todayHighlight &&
                        date.getUTCFullYear() === today.getFullYear() &&
                        date.getUTCMonth() === today.getMonth() &&
                        date.getUTCDate() === today.getDate()) {
                        cls.push('today');
                    }
                    if (this.dates.contains(date) !== -1)
                        cls.push('active');
                    if (date.valueOf() < this.o.startDate || date.valueOf() > this.o.endDate ||
                        $.inArray(date.getUTCDay(), this.o.daysOfWeekDisabled) !== -1) {
                        cls.push('disabled');
                    }
                    if (this.range) {
                        if (date > this.range[0] && date < this.range[this.range.length - 1]) {
                            cls.push('range');
                        }
                        if ($.inArray(date.valueOf(), this.range) !== -1) {
                            cls.push('selected');
                        }
                    }
                    return cls;
                },

                fill: function() {
                    var d = new Date(this.viewDate),
                        year = d.getUTCFullYear(),
                        month = d.getUTCMonth(),
                        startYear = this.o.startDate !== -Infinity ? this.o.startDate.getUTCFullYear() : -
                        Infinity,
                        startMonth = this.o.startDate !== -Infinity ? this.o.startDate.getUTCMonth() : -
                        Infinity,
                        endYear = this.o.endDate !== Infinity ? this.o.endDate.getUTCFullYear() : Infinity,
                        endMonth = this.o.endDate !== Infinity ? this.o.endDate.getUTCMonth() : Infinity,
                        todaytxt = dates[this.o.language].today || dates['en'].today || '',
                        cleartxt = dates[this.o.language].clear || dates['en'].clear || '',
                        tooltip;
                    this.picker.find('.datepicker-days thead th.datepicker-switch')
                        .text(dates[this.o.language].months[month] + ' ' + year);
                    this.picker.find('tfoot th.today')
                        .text(todaytxt)
                        .toggle(this.o.todayBtn !== false);
                    this.picker.find('tfoot th.clear')
                        .text(cleartxt)
                        .toggle(this.o.clearBtn !== false);
                    this.updateNavArrows();
                    this.fillMonths();
                    var prevMonth = UTCDate(year, month - 1, 28),
                        day = DPGlobal.getDaysInMonth(prevMonth.getUTCFullYear(), prevMonth.getUTCMonth());
                    prevMonth.setUTCDate(day);
                    prevMonth.setUTCDate(day - (prevMonth.getUTCDay() - this.o.weekStart + 7) % 7);
                    var nextMonth = new Date(prevMonth);
                    nextMonth.setUTCDate(nextMonth.getUTCDate() + 42);
                    nextMonth = nextMonth.valueOf();
                    var html = [];
                    var clsName;
                    while (prevMonth.valueOf() < nextMonth) {
                        if (prevMonth.getUTCDay() === this.o.weekStart) {
                            html.push('<tr>');
                            if (this.o.calendarWeeks) {
                                // ISO 8601: First week contains first thursday.
                                // ISO also states week starts on Monday, but we can be more abstract here.
                                var
                                    // Start of current week: based on weekstart/current date
                                    ws = new Date(+prevMonth + (this.o.weekStart - prevMonth.getUTCDay() - 7) %
                                        7 * 864e5),
                                    // Thursday of this week
                                    th = new Date(Number(ws) + (7 + 4 - ws.getUTCDay()) % 7 * 864e5),
                                    // First Thursday of year, year from thursday
                                    yth = new Date(Number(yth = UTCDate(th.getUTCFullYear(), 0, 1)) + (7 + 4 -
                                        yth.getUTCDay()) % 7 * 864e5),
                                    // Calendar week: ms between thursdays, div ms per day, div 7 days
                                    calWeek = (th - yth) / 864e5 / 7 + 1;
                                html.push('<td class="cw">' + calWeek + '</td>');

                            }
                        }
                        clsName = this.getClassNames(prevMonth);
                        clsName.push('day');

                        if (this.o.beforeShowDay !== $.noop) {
                            var before = this.o.beforeShowDay(this._utc_to_local(prevMonth));
                            if (before === undefined)
                                before = {};
                            else if (typeof(before) === 'boolean')
                                before = {
                                    enabled: before
                                };
                            else if (typeof(before) === 'string')
                                before = {
                                    classes: before
                                };
                            if (before.enabled === false)
                                clsName.push('disabled');
                            if (before.classes)
                                clsName = clsName.concat(before.classes.split(/\s+/));
                            if (before.tooltip)
                                tooltip = before.tooltip;
                        }

                        clsName = $.unique(clsName);
                        html.push('<td class="' + clsName.join(' ') + '"' + (tooltip ? ' title="' + tooltip +
                            '"' : '') + '>' + prevMonth.getUTCDate() + '</td>');
                        if (prevMonth.getUTCDay() === this.o.weekEnd) {
                            html.push('</tr>');
                        }
                        prevMonth.setUTCDate(prevMonth.getUTCDate() + 1);
                    }
                    this.picker.find('.datepicker-days tbody').empty().append(html.join(''));

                    var months = this.picker.find('.datepicker-months')
                        .find('th:eq(1)')
                        .text(year)
                        .end()
                        .find('span').removeClass('active');

                    $.each(this.dates, function(i, d) {
                        if (d.getUTCFullYear() === year)
                            months.eq(d.getUTCMonth()).addClass('active');
                    });

                    if (year < startYear || year > endYear) {
                        months.addClass('disabled');
                    }
                    if (year === startYear) {
                        months.slice(0, startMonth).addClass('disabled');
                    }
                    if (year === endYear) {
                        months.slice(endMonth + 1).addClass('disabled');
                    }

                    html = '';
                    year = parseInt(year / 10, 10) * 10;
                    var yearCont = this.picker.find('.datepicker-years')
                        .find('th:eq(1)')
                        .text(year + '-' + (year + 9))
                        .end()
                        .find('td');
                    year -= 1;
                    var years = $.map(this.dates, function(d) {
                            return d.getUTCFullYear();
                        }),
                        classes;
                    for (var i = -1; i < 11; i++) {
                        classes = ['year'];
                        if (i === -1)
                            classes.push('old');
                        else if (i === 10)
                            classes.push('new');
                        if ($.inArray(year, years) !== -1)
                            classes.push('active');
                        if (year < startYear || year > endYear)
                            classes.push('disabled');
                        html += '<span class="' + classes.join(' ') + '">' + year + '</span>';
                        year += 1;
                    }
                    yearCont.html(html);
                },

                updateNavArrows: function() {
                    if (!this._allow_update)
                        return;

                    var d = new Date(this.viewDate),
                        year = d.getUTCFullYear(),
                        month = d.getUTCMonth();
                    switch (this.viewMode) {
                        case 0:
                            if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear() &&
                                month <= this.o.startDate.getUTCMonth()) {
                                this.picker.find('.prev').css({
                                    visibility: 'hidden'
                                });
                            } else {
                                this.picker.find('.prev').css({
                                    visibility: 'visible'
                                });
                            }
                            if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear() &&
                                month >= this.o.endDate.getUTCMonth()) {
                                this.picker.find('.next').css({
                                    visibility: 'hidden'
                                });
                            } else {
                                this.picker.find('.next').css({
                                    visibility: 'visible'
                                });
                            }
                            break;
                        case 1:
                        case 2:
                            if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear()) {
                                this.picker.find('.prev').css({
                                    visibility: 'hidden'
                                });
                            } else {
                                this.picker.find('.prev').css({
                                    visibility: 'visible'
                                });
                            }
                            if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear()) {
                                this.picker.find('.next').css({
                                    visibility: 'hidden'
                                });
                            } else {
                                this.picker.find('.next').css({
                                    visibility: 'visible'
                                });
                            }
                            break;
                    }
                },

                click: function(e) {
                    e.preventDefault();
                    var target = $(e.target).closest('span, td, th'),
                        year, month, day;
                    if (target.length === 1) {
                        switch (target[0].nodeName.toLowerCase()) {
                            case 'th':
                                switch (target[0].className) {
                                    case 'datepicker-switch':
                                        this.showMode(1);
                                        break;
                                    case 'prev':
                                    case 'next':
                                        var dir = DPGlobal.modes[this.viewMode].navStep * (target[0]
                                            .className === 'prev' ? -1 : 1);
                                        switch (this.viewMode) {
                                            case 0:
                                                this.viewDate = this.moveMonth(this.viewDate, dir);
                                                this._trigger('changeMonth', this.viewDate);
                                                break;
                                            case 1:
                                            case 2:
                                                this.viewDate = this.moveYear(this.viewDate, dir);
                                                if (this.viewMode === 1)
                                                    this._trigger('changeYear', this.viewDate);
                                                break;
                                        }
                                        this.fill();
                                        break;
                                    case 'today':
                                        var date = new Date();
                                        date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0,
                                            0, 0);

                                        this.showMode(-2);
                                        var which = this.o.todayBtn === 'linked' ? null : 'view';
                                        this._setDate(date, which);
                                        break;
                                    case 'clear':
                                        var element;
                                        if (this.isInput)
                                            element = this.element;
                                        else if (this.component)
                                            element = this.element.find('input');
                                        if (element)
                                            element.val("").change();
                                        this.update();
                                        this._trigger('changeDate');
                                        if (this.o.autoclose)
                                            this.hide();
                                        break;
                                }
                                break;
                            case 'span':
                                if (!target.is('.disabled')) {
                                    this.viewDate.setUTCDate(1);
                                    if (target.is('.month')) {
                                        day = 1;
                                        month = target.parent().find('span').index(target);
                                        year = this.viewDate.getUTCFullYear();
                                        this.viewDate.setUTCMonth(month);
                                        this._trigger('changeMonth', this.viewDate);
                                        if (this.o.minViewMode === 1) {
                                            this._setDate(UTCDate(year, month, day));
                                        }
                                    } else {
                                        day = 1;
                                        month = 0;
                                        year = parseInt(target.text(), 10) || 0;
                                        this.viewDate.setUTCFullYear(year);
                                        this._trigger('changeYear', this.viewDate);
                                        if (this.o.minViewMode === 2) {
                                            this._setDate(UTCDate(year, month, day));
                                        }
                                    }
                                    this.showMode(-1);
                                    this.fill();
                                }
                                break;
                            case 'td':
                                if (target.is('.day') && !target.is('.disabled')) {
                                    day = parseInt(target.text(), 10) || 1;
                                    year = this.viewDate.getUTCFullYear();
                                    month = this.viewDate.getUTCMonth();
                                    if (target.is('.old')) {
                                        if (month === 0) {
                                            month = 11;
                                            year -= 1;
                                        } else {
                                            month -= 1;
                                        }
                                    } else if (target.is('.new')) {
                                        if (month === 11) {
                                            month = 0;
                                            year += 1;
                                        } else {
                                            month += 1;
                                        }
                                    }
                                    this._setDate(UTCDate(year, month, day));
                                }
                                break;
                        }
                    }
                    if (this.picker.is(':visible') && this._focused_from) {
                        $(this._focused_from).focus();
                    }
                    delete this._focused_from;
                },

                _toggle_multidate: function(date) {
                    var ix = this.dates.contains(date);
                    if (!date) {
                        this.dates.clear();
                    } else if (ix !== -1) {
                        this.dates.remove(ix);
                    } else {
                        this.dates.push(date);
                    }
                    if (typeof this.o.multidate === 'number')
                        while (this.dates.length > this.o.multidate)
                            this.dates.remove(0);
                },

                _setDate: function(date, which) {
                    if (!which || which === 'date')
                        this._toggle_multidate(date && new Date(date));
                    if (!which || which === 'view')
                        this.viewDate = date && new Date(date);

                    this.fill();
                    this.setValue();
                    this._trigger('changeDate');
                    var element;
                    if (this.isInput) {
                        element = this.element;
                    } else if (this.component) {
                        element = this.element.find('input');
                    }
                    if (element) {
                        element.change();
                    }
                    if (this.o.autoclose && (!which || which === 'date')) {
                        this.hide();
                    }
                },

                moveMonth: function(date, dir) {
                    if (!date)
                        return undefined;
                    if (!dir)
                        return date;
                    var new_date = new Date(date.valueOf()),
                        day = new_date.getUTCDate(),
                        month = new_date.getUTCMonth(),
                        mag = Math.abs(dir),
                        new_month, test;
                    dir = dir > 0 ? 1 : -1;
                    if (mag === 1) {
                        test = dir === -1
                            // If going back one month, make sure month is not current month
                            // (eg, Mar 31 -> Feb 31 == Feb 28, not Mar 02)
                            ?
                            function() {
                                return new_date.getUTCMonth() === month;
                            }
                            // If going forward one month, make sure month is as expected
                            // (eg, Jan 31 -> Feb 31 == Feb 28, not Mar 02)
                            :
                            function() {
                                return new_date.getUTCMonth() !== new_month;
                            };
                        new_month = month + dir;
                        new_date.setUTCMonth(new_month);
                        // Dec -> Jan (12) or Jan -> Dec (-1) -- limit expected date to 0-11
                        if (new_month < 0 || new_month > 11)
                            new_month = (new_month + 12) % 12;
                    } else {
                        // For magnitudes >1, move one month at a time...
                        for (var i = 0; i < mag; i++)
                            // ...which might decrease the day (eg, Jan 31 to Feb 28, etc)...
                            new_date = this.moveMonth(new_date, dir);
                        // ...then reset the day, keeping it in the new month
                        new_month = new_date.getUTCMonth();
                        new_date.setUTCDate(day);
                        test = function() {
                            return new_month !== new_date.getUTCMonth();
                        };
                    }
                    // Common date-resetting loop -- if date is beyond end of month, make it
                    // end of month
                    while (test()) {
                        new_date.setUTCDate(--day);
                        new_date.setUTCMonth(new_month);
                    }
                    return new_date;
                },

                moveYear: function(date, dir) {
                    return this.moveMonth(date, dir * 12);
                },

                dateWithinRange: function(date) {
                    return date >= this.o.startDate && date <= this.o.endDate;
                },

                keydown: function(e) {
                    if (this.picker.is(':not(:visible)')) {
                        if (e.keyCode === 27) // allow escape to hide and re-show picker
                            this.show();
                        return;
                    }
                    var dateChanged = false,
                        dir, newDate, newViewDate,
                        focusDate = this.focusDate || this.viewDate;
                    switch (e.keyCode) {
                        case 27: // escape
                            if (this.focusDate) {
                                this.focusDate = null;
                                this.viewDate = this.dates.get(-1) || this.viewDate;
                                this.fill();
                            } else
                                this.hide();
                            e.preventDefault();
                            break;
                        case 37: // left
                        case 39: // right
                            if (!this.o.keyboardNavigation)
                                break;
                            dir = e.keyCode === 37 ? -1 : 1;
                            if (e.ctrlKey) {
                                newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
                                newViewDate = this.moveYear(focusDate, dir);
                                this._trigger('changeYear', this.viewDate);
                            } else if (e.shiftKey) {
                                newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
                                newViewDate = this.moveMonth(focusDate, dir);
                                this._trigger('changeMonth', this.viewDate);
                            } else {
                                newDate = new Date(this.dates.get(-1) || UTCToday());
                                newDate.setUTCDate(newDate.getUTCDate() + dir);
                                newViewDate = new Date(focusDate);
                                newViewDate.setUTCDate(focusDate.getUTCDate() + dir);
                            }
                            if (this.dateWithinRange(newDate)) {
                                this.focusDate = this.viewDate = newViewDate;
                                this.setValue();
                                this.fill();
                                e.preventDefault();
                            }
                            break;
                        case 38: // up
                        case 40: // down
                            if (!this.o.keyboardNavigation)
                                break;
                            dir = e.keyCode === 38 ? -1 : 1;
                            if (e.ctrlKey) {
                                newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
                                newViewDate = this.moveYear(focusDate, dir);
                                this._trigger('changeYear', this.viewDate);
                            } else if (e.shiftKey) {
                                newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
                                newViewDate = this.moveMonth(focusDate, dir);
                                this._trigger('changeMonth', this.viewDate);
                            } else {
                                newDate = new Date(this.dates.get(-1) || UTCToday());
                                newDate.setUTCDate(newDate.getUTCDate() + dir * 7);
                                newViewDate = new Date(focusDate);
                                newViewDate.setUTCDate(focusDate.getUTCDate() + dir * 7);
                            }
                            if (this.dateWithinRange(newDate)) {
                                this.focusDate = this.viewDate = newViewDate;
                                this.setValue();
                                this.fill();
                                e.preventDefault();
                            }
                            break;
                        case 32: // spacebar
                            // Spacebar is used in manually typing dates in some formats.
                            // As such, its behavior should not be hijacked.
                            break;
                        case 13: // enter
                            focusDate = this.focusDate || this.dates.get(-1) || this.viewDate;
                            this._toggle_multidate(focusDate);
                            dateChanged = true;
                            this.focusDate = null;
                            this.viewDate = this.dates.get(-1) || this.viewDate;
                            this.setValue();
                            this.fill();
                            if (this.picker.is(':visible')) {
                                e.preventDefault();
                                if (this.o.autoclose)
                                    this.hide();
                            }
                            break;
                        case 9: // tab
                            this.focusDate = null;
                            this.viewDate = this.dates.get(-1) || this.viewDate;
                            this.fill();
                            this.hide();
                            break;
                    }
                    if (dateChanged) {
                        if (this.dates.length)
                            this._trigger('changeDate');
                        else
                            this._trigger('clearDate');
                        var element;
                        if (this.isInput) {
                            element = this.element;
                        } else if (this.component) {
                            element = this.element.find('input');
                        }
                        if (element) {
                            element.change();
                        }
                    }
                },

                showMode: function(dir) {
                    if (dir) {
                        this.viewMode = Math.max(this.o.minViewMode, Math.min(2, this.viewMode + dir));
                    }
                    this.picker
                        .find('>div')
                        .hide()
                        .filter('.datepicker-' + DPGlobal.modes[this.viewMode].clsName)
                        .css('display', 'block');
                    this.updateNavArrows();
                }
            };

            var DateRangePicker = function(element, options) {
                this.element = $(element);
                this.inputs = $.map(options.inputs, function(i) {
                    return i.jquery ? i[0] : i;
                });
                delete options.inputs;

                $(this.inputs)
                    .datepicker(options)
                    .bind('changeDate', $.proxy(this.dateUpdated, this));

                this.pickers = $.map(this.inputs, function(i) {
                    return $(i).data('datepicker');
                });
                this.updateDates();
            };
            DateRangePicker.prototype = {
                updateDates: function() {
                    this.dates = $.map(this.pickers, function(i) {
                        return i.getUTCDate();
                    });
                    this.updateRanges();
                },
                updateRanges: function() {
                    var range = $.map(this.dates, function(d) {
                        return d.valueOf();
                    });
                    $.each(this.pickers, function(i, p) {
                        p.setRange(range);
                    });
                },
                dateUpdated: function(e) {
                    // `this.updating` is a workaround for preventing infinite recursion
                    // between `changeDate` triggering and `setUTCDate` calling.  Until
                    // there is a better mechanism.
                    if (this.updating)
                        return;
                    this.updating = true;

                    var dp = $(e.target).data('datepicker'),
                        new_date = dp.getUTCDate(),
                        i = $.inArray(e.target, this.inputs),
                        l = this.inputs.length;
                    if (i === -1)
                        return;

                    $.each(this.pickers, function(i, p) {
                        if (!p.getUTCDate())
                            p.setUTCDate(new_date);
                    });

                    if (new_date < this.dates[i]) {
                        // Date being moved earlier/left
                        while (i >= 0 && new_date < this.dates[i]) {
                            this.pickers[i--].setUTCDate(new_date);
                        }
                    } else if (new_date > this.dates[i]) {
                        // Date being moved later/right
                        while (i < l && new_date > this.dates[i]) {
                            this.pickers[i++].setUTCDate(new_date);
                        }
                    }
                    this.updateDates();

                    delete this.updating;
                },
                remove: function() {
                    $.map(this.pickers, function(p) {
                        p.remove();
                    });
                    delete this.element.data().datepicker;
                }
            };

            function opts_from_el(el, prefix) {
                // Derive options from element data-attrs
                var data = $(el).data(),
                    out = {},
                    inkey,
                    replace = new RegExp('^' + prefix.toLowerCase() + '([A-Z])');
                prefix = new RegExp('^' + prefix.toLowerCase());

                function re_lower(_, a) {
                    return a.toLowerCase();
                }
                for (var key in data)
                    if (prefix.test(key)) {
                        inkey = key.replace(replace, re_lower);
                        out[inkey] = data[key];
                    }
                return out;
            }

            function opts_from_locale(lang) {
                // Derive options from locale plugins
                var out = {};
                // Check if "de-DE" style date is available, if not language should
                // fallback to 2 letter code eg "de"
                if (!dates[lang]) {
                    lang = lang.split('-')[0];
                    if (!dates[lang])
                        return;
                }
                var d = dates[lang];
                $.each(locale_opts, function(i, k) {
                    if (k in d)
                        out[k] = d[k];
                });
                return out;
            }

            var old = $.fn.datepicker;
            $.fn.datepicker = function(option) {
                var args = Array.apply(null, arguments);
                args.shift();
                var internal_return;
                this.each(function() {
                    var $this = $(this),
                        data = $this.data('datepicker'),
                        options = typeof option === 'object' && option;
                    if (!data) {
                        var elopts = opts_from_el(this, 'date'),
                            // Preliminary otions
                            xopts = $.extend({}, defaults, elopts, options),
                            locopts = opts_from_locale(xopts.language),
                            // Options priority: js args, data-attrs, locales, defaults
                            opts = $.extend({}, defaults, locopts, elopts, options);
                        if ($this.is('.input-daterange') || opts.inputs) {
                            var ropts = {
                                inputs: opts.inputs || $this.find('input').toArray()
                            };
                            $this.data('datepicker', (data = new DateRangePicker(this, $.extend(opts,
                                ropts))));
                        } else {
                            $this.data('datepicker', (data = new Datepicker(this, opts)));
                        }
                    }
                    if (typeof option === 'string' && typeof data[option] === 'function') {
                        internal_return = data[option].apply(data, args);
                        if (internal_return !== undefined)
                            return false;
                    }
                });
                if (internal_return !== undefined)
                    return internal_return;
                else
                    return this;
            };

            var defaults = $.fn.datepicker.defaults = {
                autoclose: false,
                beforeShowDay: $.noop,
                calendarWeeks: false,
                clearBtn: false,
                daysOfWeekDisabled: [],
                endDate: Infinity,
                forceParse: true,
                format: 'mm/dd/yyyy',
                keyboardNavigation: true,
                language: 'en',
                minViewMode: 0,
                multidate: false,
                multidateSeparator: ',',
                orientation: "auto",
                rtl: false,
                startDate: -Infinity,
                startView: 0,
                todayBtn: false,
                todayHighlight: false,
                weekStart: 0
            };
            var locale_opts = $.fn.datepicker.locale_opts = [
                'format',
                'rtl',
                'weekStart'
            ];
            $.fn.datepicker.Constructor = Datepicker;
            var dates = $.fn.datepicker.dates = {
                en: {
                    days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                    daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                    daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                    months: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                        "October", "November", "December"
                    ],
                    monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ],
                    today: "Today",
                    clear: "Clear"
                }
            };

            var DPGlobal = {
                modes: [{
                        clsName: 'days',
                        navFnc: 'Month',
                        navStep: 1
                    },
                    {
                        clsName: 'months',
                        navFnc: 'FullYear',
                        navStep: 1
                    },
                    {
                        clsName: 'years',
                        navFnc: 'FullYear',
                        navStep: 10
                    }
                ],
                isLeapYear: function(year) {
                    return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
                },
                getDaysInMonth: function(year, month) {
                    return [31, (DPGlobal.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][
                        month
                    ];
                },
                validParts: /dd?|DD?|mm?|MM?|yy(?:yy)?/g,
                nonpunctuation: /[^ -\/:-@\[\u3400-\u9fff-`{-~\t\n\r]+/g,
                parseFormat: function(format) {
                    // IE treats \0 as a string end in inputs (truncating the value),
                    // so it's a bad format delimiter, anyway
                    var separators = format.replace(this.validParts, '\0').split('\0'),
                        parts = format.match(this.validParts);
                    if (!separators || !separators.length || !parts || parts.length === 0) {
                        throw new Error("Invalid date format.");
                    }
                    return {
                        separators: separators,
                        parts: parts
                    };
                },
                parseDate: function(date, format, language) {
                    if (!date)
                        return undefined;
                    if (date instanceof Date)
                        return date;
                    if (typeof format === 'string')
                        format = DPGlobal.parseFormat(format);
                    var part_re = /([\-+]\d+)([dmwy])/,
                        parts = date.match(/([\-+]\d+)([dmwy])/g),
                        part, dir, i;
                    if (/^[\-+]\d+[dmwy]([\s,]+[\-+]\d+[dmwy])*$/.test(date)) {
                        date = new Date();
                        for (i = 0; i < parts.length; i++) {
                            part = part_re.exec(parts[i]);
                            dir = parseInt(part[1]);
                            switch (part[2]) {
                                case 'd':
                                    date.setUTCDate(date.getUTCDate() + dir);
                                    break;
                                case 'm':
                                    date = Datepicker.prototype.moveMonth.call(Datepicker.prototype, date, dir);
                                    break;
                                case 'w':
                                    date.setUTCDate(date.getUTCDate() + dir * 7);
                                    break;
                                case 'y':
                                    date = Datepicker.prototype.moveYear.call(Datepicker.prototype, date, dir);
                                    break;
                            }
                        }
                        return UTCDate(date.getUTCFullYear(), date.getUTCMonth(), date.getUTCDate(), 0, 0, 0);
                    }
                    parts = date && date.match(this.nonpunctuation) || [];
                    date = new Date();
                    var parsed = {},
                        setters_order = ['yyyy', 'yy', 'M', 'MM', 'm', 'mm', 'd', 'dd'],
                        setters_map = {
                            yyyy: function(d, v) {
                                return d.setUTCFullYear(v);
                            },
                            yy: function(d, v) {
                                return d.setUTCFullYear(2000 + v);
                            },
                            m: function(d, v) {
                                if (isNaN(d))
                                    return d;
                                v -= 1;
                                while (v < 0) v += 12;
                                v %= 12;
                                d.setUTCMonth(v);
                                while (d.getUTCMonth() !== v)
                                    d.setUTCDate(d.getUTCDate() - 1);
                                return d;
                            },
                            d: function(d, v) {
                                return d.setUTCDate(v);
                            }
                        },
                        val, filtered;
                    setters_map['M'] = setters_map['MM'] = setters_map['mm'] = setters_map['m'];
                    setters_map['dd'] = setters_map['d'];
                    date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);
                    var fparts = format.parts.slice();
                    // Remove noop parts
                    if (parts.length !== fparts.length) {
                        fparts = $(fparts).filter(function(i, p) {
                            return $.inArray(p, setters_order) !== -1;
                        }).toArray();
                    }
                    // Process remainder
                    function match_part() {
                        var m = this.slice(0, parts[i].length),
                            p = parts[i].slice(0, m.length);
                        return m === p;
                    }
                    if (parts.length === fparts.length) {
                        var cnt;
                        for (i = 0, cnt = fparts.length; i < cnt; i++) {
                            val = parseInt(parts[i], 10);
                            part = fparts[i];
                            if (isNaN(val)) {
                                switch (part) {
                                    case 'MM':
                                        filtered = $(dates[language].months).filter(match_part);
                                        val = $.inArray(filtered[0], dates[language].months) + 1;
                                        break;
                                    case 'M':
                                        filtered = $(dates[language].monthsShort).filter(match_part);
                                        val = $.inArray(filtered[0], dates[language].monthsShort) + 1;
                                        break;
                                }
                            }
                            parsed[part] = val;
                        }
                        var _date, s;
                        for (i = 0; i < setters_order.length; i++) {
                            s = setters_order[i];
                            if (s in parsed && !isNaN(parsed[s])) {
                                _date = new Date(date);
                                setters_map[s](_date, parsed[s]);
                                if (!isNaN(_date))
                                    date = _date;
                            }
                        }
                    }
                    return date;
                },
                formatDate: function(date, format, language) {
                    if (!date)
                        return '';
                    if (typeof format === 'string')
                        format = DPGlobal.parseFormat(format);
                    var val = {
                        d: date.getUTCDate(),
                        D: dates[language].daysShort[date.getUTCDay()],
                        DD: dates[language].days[date.getUTCDay()],
                        m: date.getUTCMonth() + 1,
                        M: dates[language].monthsShort[date.getUTCMonth()],
                        MM: dates[language].months[date.getUTCMonth()],
                        yy: date.getUTCFullYear().toString().substring(2),
                        yyyy: date.getUTCFullYear()
                    };
                    val.dd = (val.d < 10 ? '0' : '') + val.d;
                    val.mm = (val.m < 10 ? '0' : '') + val.m;
                    date = [];
                    var seps = $.extend([], format.separators);
                    for (var i = 0, cnt = format.parts.length; i <= cnt; i++) {
                        if (seps.length)
                            date.push(seps.shift());
                        date.push(val[format.parts[i]]);
                    }
                    return date.join('');
                },
                headTemplate: '<thead>' +
                    '<tr>' +
                    '<th class="prev">&laquo;</th>' +
                    '<th colspan="5" class="datepicker-switch"></th>' +
                    '<th class="next">&raquo;</th>' +
                    '</tr>' +
                    '</thead>',
                contTemplate: '<tbody><tr><td colspan="7"></td></tr></tbody>',
                footTemplate: '<tfoot>' +
                    '<tr>' +
                    '<th colspan="7" class="today"></th>' +
                    '</tr>' +
                    '<tr>' +
                    '<th colspan="7" class="clear"></th>' +
                    '</tr>' +
                    '</tfoot>'
            };
            DPGlobal.template = '<div class="datepicker">' +
                '<div class="datepicker-days">' +
                '<table class=" table-condensed">' +
                DPGlobal.headTemplate +
                '<tbody></tbody>' +
                DPGlobal.footTemplate +
                '</table>' +
                '</div>' +
                '<div class="datepicker-months">' +
                '<table class="table-condensed">' +
                DPGlobal.headTemplate +
                DPGlobal.contTemplate +
                DPGlobal.footTemplate +
                '</table>' +
                '</div>' +
                '<div class="datepicker-years">' +
                '<table class="table-condensed">' +
                DPGlobal.headTemplate +
                DPGlobal.contTemplate +
                DPGlobal.footTemplate +
                '</table>' +
                '</div>' +
                '</div>';

            $.fn.datepicker.DPGlobal = DPGlobal;


            /* DATEPICKER NO CONFLICT
             * =================== */

            $.fn.datepicker.noConflict = function() {
                $.fn.datepicker = old;
                return this;
            };


            /* DATEPICKER DATA-API
             * ================== */

            $(document).on(
                'focus.datepicker.data-api click.datepicker.data-api',
                '[data-provide="datepicker"]',
                function(e) {
                    var $this = $(this);
                    if ($this.data('datepicker'))
                        return;
                    e.preventDefault();
                    // component click requires us to explicitly show it
                    $this.datepicker('show');
                }
            );
            $(function() {
                $('[data-provide="datepicker-inline"]').datepicker();
            });

        }(window.jQuery));

        /*
         * Date Format 1.2.3
         * (c) 2007-2009 Steven Levithan <stevenlevithan.com>
         * MIT license
         *
         * Includes enhancements by Scott Trenda <scott.trenda.net>
         * and Kris Kowal <cixar.com/~kris.kowal/>
         *
         * Accepts a date, a mask, or a date and a mask.
         * Returns a formatted version of the given date.
         * The date defaults to the current date/time.
         * The mask defaults to dateFormat.masks.default.
         */

        var dateFormat = function() {
            var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
                timezone =
                /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
                timezoneClip = /[^-+\dA-Z]/g,
                pad = function(val, len) {
                    val = String(val);
                    len = len || 2;
                    while (val.length < len) val = "0" + val;
                    return val;
                };

            // Regexes and supporting functions are cached through closure
            return function(date, mask, utc) {
                var dF = dateFormat;

                // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
                if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/
                    .test(date)) {
                    mask = date;
                    date = undefined;
                }

                // Passing date through Date applies Date.parse, if necessary
                date = date ? new Date(date) : new Date;
                if (isNaN(date)) throw SyntaxError("invalid date");

                mask = String(dF.masks[mask] || mask || dF.masks["default"]);

                // Allow setting the utc argument via the mask
                if (mask.slice(0, 4) == "UTC:") {
                    mask = mask.slice(4);
                    utc = true;
                }

                var _ = utc ? "getUTC" : "get",
                    d = date[_ + "Date"](),
                    D = date[_ + "Day"](),
                    m = date[_ + "Month"](),
                    y = date[_ + "FullYear"](),
                    H = date[_ + "Hours"](),
                    M = date[_ + "Minutes"](),
                    s = date[_ + "Seconds"](),
                    L = date[_ + "Milliseconds"](),
                    o = utc ? 0 : date.getTimezoneOffset(),
                    flags = {
                        d: d,
                        dd: pad(d),
                        ddd: dF.i18n.dayNames[D],
                        dddd: dF.i18n.dayNames[D + 7],
                        m: m + 1,
                        mm: pad(m + 1),
                        mmm: dF.i18n.monthNames[m],
                        mmmm: dF.i18n.monthNames[m + 12],
                        yy: String(y).slice(2),
                        yyyy: y,
                        h: H % 12 || 12,
                        hh: pad(H % 12 || 12),
                        H: H,
                        HH: pad(H),
                        M: M,
                        MM: pad(M),
                        s: s,
                        ss: pad(s),
                        l: pad(L, 3),
                        L: pad(L > 99 ? Math.round(L / 10) : L),
                        t: H < 12 ? "a" : "p",
                        tt: H < 12 ? "am" : "pm",
                        T: H < 12 ? "A" : "P",
                        TT: H < 12 ? "AM" : "PM",
                        Z: utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
                        o: (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
                        S: ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
                    };

                return mask.replace(token, function($0) {
                    return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
                });
            };
        }();

        // Some common format strings
        dateFormat.masks = {
            "default": "ddd mmm dd yyyy HH:MM:ss",
            shortDate: "m/d/yy",
            mediumDate: "mmm d, yyyy",
            longDate: "mmmm d, yyyy",
            fullDate: "dddd, mmmm d, yyyy",
            shortTime: "h:MM TT",
            mediumTime: "h:MM:ss TT",
            longTime: "h:MM:ss TT Z",
            isoDate: "yyyy-mm-dd",
            isoTime: "HH:MM:ss",
            isoDateTime: "yyyy-mm-dd'T'HH:MM:ss",
            isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
        };

        // Internationalization strings
        dateFormat.i18n = {
            dayNames: [
                "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
                "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
            ],
            monthNames: [
                "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
                "January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
                "November", "December"
            ]
        };

        // For convenience...
        Date.prototype.format = function(mask, utc) {
            return dateFormat(this, mask, utc);
        };

        $.fn.notes = function(name) {
            return this.each(function() {
                var self = $(this);
                var add = self.find(name + "__add");
                var time = self.find(name + "__time");
                var field = self.find(name + "__field");
                var list = self.find(name + "__list");

                var prevHtml = '';

                add.on('click', function() {
                    if (field.val() != '' && field.val() != prevHtml) {
                        var html = "<li><span>" + (time.val() ? time.val() : "00:00") + "</span>" +
                            field.val() + "</li>";
                        prevHtml = field.val();

                        list.append(html);

                        setInterval(function() {
                            prevHtml = '';
                        }, 5000)
                    }

                    return false;
                });
            });
        }

        $(function() {
            $(".b-notes").notes(".b-notes");

            $("#calendar").datepicker({
                todayHighlight: true,
                weekStart: 1
            }).on({

                'changeDate': function(e) {

                    if (typeof(e.date) == "undefined") return false;

                    var milliseconds = Date.parse(e.date);

                    setCelendarDay(milliseconds);
                }

            });

            var today = new Date();
            var milliseconds = Date.parse(today);

            setCelendarDay(milliseconds);

            function setCelendarDay(milliseconds) {
                var date = new Date(milliseconds).format("dd/mm/yyyy");
                var formatTitle = new Date(milliseconds).format("dddd, <b>d mmmm</b>");
                var list = $(".b-notes__list");
                var title = $(".b-app__title");

                $.getJSON("https://dl.dropboxusercontent.com/u/27474693/db.json", function(data) {

                    $.each(data.days, function() {
                        var obj = this;

                        if (date == obj.day) {
                            var items = obj.data;

                            list.html('');

                            $.each(items, function() {
                                var html = "<li><span>" + this.time + "</span>" + this
                                    .title + "</li>";
                                list.append(html);
                            });

                            return false;
                        } else {
                            list.html('');
                        }

                        title.html(formatTitle);
                    })

                });
            }
        });
    </script>
@endsection
