@extends('layouts.admin')

@section('title', 'KUVUO CMS - Import Product Catalog')
@section('cms_title', 'Import Product Catalog')
@section('cms_subtitle', 'Upload WooCommerce-format CSV files to overwrite and update the website storefront catalog.')

@section('cms_content')
<style>
    .cms-btn-primary {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 12px 20px; background: var(--cms-green-900); color: #fff; text-decoration: none;
        border: 1px solid var(--cms-green-900); font-weight: 700; transition: background-color .15s ease;
        font-size: 14px; cursor: pointer; gap: 8px;
    }
    .cms-btn-primary:hover { background: var(--cms-green-700); border-color: var(--cms-green-700); }
    
    .cms-btn-secondary {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 12px 20px; background: #fff; color: var(--cms-green-900); text-decoration: none;
        border: 1px solid var(--cms-border); font-weight: 700; transition: border-color .15s ease, background-color .15s ease;
        font-size: 14px; cursor: pointer; gap: 8px;
    }
    .cms-btn-secondary:hover { border-color: var(--cms-green-900); background: var(--cms-green-25); }

    .cms-btn-danger {
        display: inline-flex; align-items: center; justify-content: center;
        padding: 12px 20px; background: #991b1b; color: #fff; text-decoration: none;
        border: 1px solid #991b1b; font-weight: 700; transition: background-color .15s ease;
        font-size: 14px; cursor: pointer; gap: 8px;
    }
    .cms-btn-danger:hover { background: #7f1d1d; border-color: #7f1d1d; }

    .cms-card {
        background: var(--cms-white);
        border: 1px solid var(--cms-border);
        padding: 28px;
        margin-bottom: 24px;
        box-shadow: var(--cms-shadow);
    }

    .cms-errors {
        margin-bottom: 24px; padding: 14px 16px; border: 1px solid rgba(185, 28, 28, 0.2);
        background: #FFF1F2; color: #991B1B; font-weight: 600;
    }

    /* Drag and drop upload zone */
    .cms-upload-zone {
        border: 2px dashed var(--cms-border-strong);
        background: var(--cms-green-25);
        padding: 48px 24px;
        text-align: center;
        margin-bottom: 24px;
        transition: border-color .15s ease, background-color .15s ease;
        cursor: pointer;
        position: relative;
    }
    .cms-upload-zone:hover, .cms-upload-zone.dragover {
        border-color: var(--cms-green-700);
        background: var(--cms-green-50);
    }
    .cms-upload-zone input[type="file"] {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        opacity: 0;
        cursor: pointer;
    }
    .cms-upload-icon {
        font-size: 40px;
        color: var(--cms-green-700);
        margin-bottom: 16px;
    }
    .cms-upload-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--cms-green-900);
        margin-bottom: 4px;
    }
    .cms-upload-desc {
        font-size: 13px;
        color: var(--cms-muted);
    }
    
    .cms-file-info {
        margin-top: 14px;
        font-weight: 700;
        color: var(--cms-green-900);
        display: none;
    }

    /* Structure mapping tips */
    .cms-tips-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-top: 28px;
        padding-top: 24px;
        border-top: 1px solid var(--cms-border);
    }
    .cms-tip-box h3 {
        margin: 0 0 10px;
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        color: var(--cms-green-900);
        letter-spacing: 0.05em;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .cms-tip-box ul {
        margin: 0;
        padding-left: 20px;
        font-size: 13px;
        color: var(--cms-muted);
        line-height: 1.8;
    }
    .cms-tip-box code {
        background: #f3f4f6;
        padding: 2px 4px;
        font-size: 12px;
        border: 1px solid #e5e7eb;
        color: var(--cms-green-900);
    }
</style>

@if ($errors->any())
    <div class="cms-errors">
        <i class="fa-solid fa-triangle-exclamation" style="margin-right: 6px;"></i>
        {{ $errors->first() }}
    </div>
@endif

<div class="cms-card">
    <form action="{{ route('admin.products.import.submit') }}" method="POST" enctype="multipart/form-data" id="import-form">
        @csrf
        
        <div class="cms-upload-zone" id="drop-zone">
            <input type="file" name="csv_file" id="file-input" accept=".csv,text/csv,text/plain" required>
            <div class="cms-upload-icon">
                <i class="fa-solid fa-file-csv"></i>
            </div>
            <div class="cms-upload-title" id="upload-title">Drag & Drop product CSV here</div>
            <div class="cms-upload-desc">or click here to browse files (maximum size 10MB)</div>
            <div class="cms-file-info" id="file-info">
                <i class="fa-solid fa-file-circle-check"></i> Selected: <span id="file-name"></span>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
            <div style="display: flex; gap: 10px;">
                <button type="submit" class="cms-btn-primary">
                    <i class="fa-solid fa-circle-arrow-up"></i> Upload & Import
                </button>
                <a href="{{ route('admin.products.index') }}" class="cms-btn-secondary">Cancel</a>
            </div>
            
            <a href="{{ route('admin.products.export') }}" class="cms-btn-secondary">
                <i class="fa-solid fa-download"></i> Download Current Catalog Template
            </a>
        </div>
    </form>
</div>

<!-- Backups & Restore Card (Safety Net) -->
<div class="cms-card" style="border-left: 4px solid var(--cms-accent);">
    <h2 style="font-family: 'Science Gothic', Arial, sans-serif; font-size: 20px; margin: 0 0 10px; color: var(--cms-green-900);">
        CMS Safety Net & Backups
    </h2>
    <p style="margin: 0 0 20px; color: var(--cms-muted); font-size: 14px; line-height: 1.6;">
        Every catalog import creates a secure snapshot backup of the catalog database. If you notice any formatting errors or missing data in your newly imported catalog, you can revert instantly to the previous version.
    </p>
    
    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px;">
        <span style="font-size: 13px; color: var(--cms-muted);">
            <strong>Current active file updated:</strong> {{ $lastUpdated }}
        </span>

        @if ($backupExists)
            <form action="{{ route('admin.products.restore') }}" method="POST" onsubmit="return confirm('Are you sure you want to roll back the current catalog to the previous backup?');" style="margin: 0;">
                @csrf
                <button type="submit" class="cms-btn-danger">
                    <i class="fa-solid fa-clock-rotate-left"></i> Revert to Last Backup
                </button>
            </form>
        @else
            <span style="font-size: 12px; font-weight: 700; color: var(--cms-muted); background: #f3f4f6; padding: 8px 12px; border: 1px solid var(--cms-border);">
                <i class="fa-solid fa-circle-info"></i> No prior backups available
            </span>
        @endif
    </div>
</div>

<!-- Formatting Guide Card -->
<div class="cms-card">
    <h2 style="font-family: 'Science Gothic', Arial, sans-serif; font-size: 20px; margin: 0 0 10px; color: var(--cms-green-900);">
        CSV Catalog Structure Guide
    </h2>
    <p style="margin: 0 0 20px; color: var(--cms-muted); font-size: 14px;">
        The system maps headers matching the WooCommerce Product Export specification. Review the required and supported columns below:
    </p>

    <div class="cms-tips-grid">
        <div class="cms-tip-box">
            <h3><i class="fa-solid fa-star" style="color: var(--cms-accent);"></i> Required Columns</h3>
            <ul>
                <li><code>Name</code>: Display name of the product (e.g. <code>Typhon Tyrant X 1 Ton Digger</code>).</li>
                <li><code>Categories</code>: Comma-separated list. Top-level categories dictate catalog filters (e.g. <code>Mini Excavators, Equipment</code>).</li>
            </ul>
        </div>

        <div class="cms-tip-box">
            <h3><i class="fa-solid fa-circle-info" style="color: var(--cms-green-700);"></i> Core Fields</h3>
            <ul>
                <li><code>SKU</code>: Unique catalog reference identifier code.</li>
                <li><code>Regular price</code>: Product retail price number.</li>
                <li><code>Sale price</code>: Promotional price (will show as a sale tag on the storefront).</li>
                <li><code>In stock?</code>: Set to <code>1</code> for in-stock, <code>0</code> for out-of-stock.</li>
            </ul>
        </div>

        <div class="cms-tip-box">
            <h3><i class="fa-solid fa-circle-nodes" style="color: var(--cms-green-700);"></i> Media & Links</h3>
            <ul>
                <li><code>Images</code>: Comma-separated list of image URLs. First URL becomes main preview (e.g. <code>https://domain.com/img1.jpg, https://domain.com/img2.jpg</code>).</li>
                <li><code>External URL</code>: Direct purchase or affiliate link, such as Ecwid e-commerce platform URLs.</li>
            </ul>
        </div>

        <div class="cms-tip-box">
            <h3><i class="fa-solid fa-list-check" style="color: var(--cms-green-700);"></i> Specifications</h3>
            <ul>
                <li><code>Attribute 1 name</code>: e.g. <code>Engine</code></li>
                <li><code>Attribute 1 value(s)</code>: e.g. <code>13.5HP Briggs & Stratton</code></li>
                <li>Supports attributes 1, 2, and 3, plus dimension columns (<code>Weight (lbs)</code>, <code>Length (in)</code>, etc.).</li>
            </ul>
        </div>
    </div>
</div>

<script>
    // Nice interactive drag-and-drop feedback
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('file-input');
    const fileInfo = document.getElementById('file-info');
    const fileName = document.getElementById('file-name');
    const uploadTitle = document.getElementById('upload-title');

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, e => {
            e.preventDefault();
            dropZone.classList.add('dragover');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, e => {
            e.preventDefault();
            dropZone.classList.remove('dragover');
        }, false);
    });

    dropZone.addEventListener('drop', e => {
        const dt = e.dataTransfer;
        const files = dt.files;
        if(files.length > 0) {
            fileInput.files = files;
            updateFileInfo(files[0].name);
        }
    });

    fileInput.addEventListener('change', e => {
        if(fileInput.files.length > 0) {
            updateFileInfo(fileInput.files[0].name);
        }
    });

    function updateFileInfo(name) {
        fileName.textContent = name;
        fileInfo.style.display = 'block';
        uploadTitle.textContent = "File Selected";
    }
</script>
@endsection
