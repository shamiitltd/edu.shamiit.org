<!-- pdf-export.blade.php -->
<button id="pdfExportBtn" class="btn btn-primary">Export to PDF</button>

<script>
    <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary" href="{{ URL::to('/homework list/Export to PDF') }}">Export to PDF</a>
        </div
    // Add any JavaScript logic for PDF export button if needed
    $(document).ready(function() {
        $('#pdfExportBtn').on('click', function() {
            // Add code to trigger PDF export
            alert('Exporting to PDF...');
        });
    });
</script>
