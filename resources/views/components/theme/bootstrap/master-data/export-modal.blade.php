@props(['formats' => ['csv', 'xlsx', 'pdf'], 'url' => null])

<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 pb-2">
                <h6 class="modal-title fw-semibold" id="exportModalLabel">
                    <i class="bi bi-download me-2 text-primary"></i>Export Data
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted small mb-3">Select the format you want to export:</p>
                <div class="d-grid gap-2">
                    @foreach ($formats as $format)
                        <a href="{{ $url }}?format={{ $format }}" class="btn btn-outline-secondary d-flex align-items-center justify-content-between">
                            <span>
                                <i class="bi bi-file-{{ $format === 'xlsx' ? 'excel' : $format }} me-2"></i>
                                {{ strtoupper($format) }}
                            </span>
                            <i class="bi bi-chevron-right small text-muted"></i>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Auto-open modal if triggered via data attribute
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-bs-toggle="export-modal"]').forEach(function (el) {
            el.addEventListener('click', function () {
                const modal = new bootstrap.Modal(document.getElementById('exportModal'));
                modal.show();
            });
        });
    });
</script>
@endpush
