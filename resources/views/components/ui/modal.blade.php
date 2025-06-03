{{-- This is a way to define required and default properties without having to add
  -- an additional PHP class
  --}}
@props(['name', 'type' => 'light', 'trigger', 'title', 'footer' => null])

<div>
    {{-- The button that triggers the modal. The Trigger slot is responsible for the content --}}
    <button {{ $trigger->attributes->class(['button', 'js-modal-trigger']) }} data-target="modal-{{ $name }}">
        {{ $trigger }}
    </button>

    {{-- The modal itself. The name attribute should make each modal unique in the page --}}
    <div class="modal" id="modal-{{ $name }}">
        <div class="modal-background"></div>
        <div class="modal-card">
            {{-- The type attribute can be set to Bulma color names like danger or primary --}}
            {{-- This is used throughout this modal --}}
            <header class="modal-card-head has-background-{{ $type }}">
                {{-- The title slot or attribute sets the title --}}
                <p class="modal-card-title">{{ $title }}</p>
                <button type="button" class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body has-background-{{ $type=='light' ? 'white' : $type.'-light' }}">
                {{ $slot }}
            </section>
            @if($footer)
                <footer class="modal-card-foot has-background-{{ $type=='light' ? 'white' : $type.'-light' }}">
                    <div class="field is-grouped">
                        {{ $footer }}
                    </div>
                </footer>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Functions to open and close a modal
            function openModal($el) {
                $el.classList.add('is-active');
            }

            function closeModal($el) {
                $el.classList.remove('is-active');
            }

            function closeAllModals() {
                (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                    closeModal($modal);
                });
            }

            // Add a click event on buttons to open a specific modal
            (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
                const modal = $trigger.dataset.target;
                const $target = document.getElementById(modal);

                $trigger.addEventListener('click', () => {
                    openModal($target);
                });
            });

            // Add a click event on various child elements to close the parent modal
            (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .cancel, .modal-card-foot') || []).forEach(($close) => {
                const $target = $close.closest('.modal');

                $close.addEventListener('click', () => {
                    closeModal($target);
                });
            });

            // Add a keyboard event to close all modals
            document.addEventListener('keydown', (event) => {
                const e = event || window.event;

                if (e.keyCode === 27) { // Escape key
                    closeAllModals();
                }
            });
        });
    </script>
@endpush
