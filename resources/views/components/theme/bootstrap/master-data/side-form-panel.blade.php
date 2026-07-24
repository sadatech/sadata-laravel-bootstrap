@props(['title' => null, 'visible' => false, 'width' => '480px'])

<div class="side-form-panel {{ $visible ? 'show' : '' }}" style="width: {{ $width }};" id="sideFormPanel">
    <div class="side-form-panel__backdrop" data-dismiss="side-form"></div>
    <div class="side-form-panel__body shadow-lg">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom bg-white">
            <h6 class="mb-0 fw-semibold">{{ $title }}</h6>
            <button type="button" class="btn-close btn-close-white" data-dismiss="side-form" aria-label="Close"></button>
        </div>
        <div class="side-form-panel__content p-4" style="overflow-y: auto; max-height: calc(100vh - 70px);">
            {{ $slot }}
        </div>
    </div>
</div>

@push('styles')
<style>
    .side-form-panel {
        position: fixed;
        top: 0;
        right: 0;
        height: 100vh;
        z-index: 1050;
        transition: transform 0.3s ease-in-out;
        transform: translateX(100%);
    }
    .side-form-panel.show {
        transform: translateX(0);
    }
    .side-form-panel__backdrop {
        position: absolute;
        top: 0;
        left: -100vw;
        width: 100vw;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        cursor: pointer;
    }
    .side-form-panel__body {
        position: relative;
        height: 100%;
        background: #fff;
        margin-left: auto;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-dismiss="side-form"]').forEach(function (el) {
            el.addEventListener('click', function () {
                const panel = document.getElementById('sideFormPanel');
                if (panel) {
                    panel.classList.remove('show');
                }
            });
        });
    });
</script>
@endpush
