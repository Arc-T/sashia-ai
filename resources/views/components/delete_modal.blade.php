<div id="delete-modal" uk-modal>
    <div class="uk-modal-dialog uk-box-shadow-xlarge uk-width-1-1 uk-width-2xlarge@m"
        style="max-height: 90vh; display: flex; flex-direction: column; overflow: hidden;">
        
        <!-- Close -->
        {{-- <button class="uk-modal-close-default uk-icon-button uk-button-danger" type="button" uk-close></button> --}}

        <!-- Header -->
        <div class="uk-padding-small uk-background-danger uk-light">
            <div class="uk-flex uk-flex-middle">
                <span class="uk-margin-small-left" uk-icon="icon: warning; ratio: 1.5"></span>
                <h3 class="uk-modal-title uk-text-bold uk-margin-remove">حذف آیتم</h3>
            </div>
        </div>

        <!-- Body -->
        <div class="uk-padding">
            <div class="uk-flex uk-flex-center uk-margin-bottom">
                <div class="uk-background-muted uk-padding-small">
                    <span class="uk-text-danger" uk-icon="icon: trash; ratio: 2"></span>
                </div>
            </div>
            
            <p class="uk-text-large uk-text-bold uk-text-center uk-margin-small-bottom" id="delete-modal-message">
                آیا مطمئن هستید که می‌خواهید این آیتم را حذف کنید؟
            </p>
            <p class="uk-text-meta uk-text-center uk-margin-remove">
                این عملیات قابل بازگشت نیست و اطلاعات برای همیشه حذف خواهند شد.
            </p>
        </div>

        <!-- Footer -->
        <div class="uk-padding-small uk-background-muted">
            <div class="uk-child-width-1-2@m uk-grid-small" uk-grid>
                <div>
                    <button class="uk-button uk-button-default uk-width-1-1 uk-border-pill" type="button" uk-toggle="target: #delete-modal">
                        <span uk-icon="icon: close" class="uk-margin-small-left"></span> لغو
                    </button>
                </div>
                <div>
                    <form method="POST" action="" id="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="uk-button uk-button-danger uk-width-1-1 uk-border-pill" type="submit" id="confirm-delete-btn">
                            <span uk-icon="icon: trash" class="uk-margin-small-left"></span>
                            <span class="delete-text">حذف</span>
                            <div class="uk-hidden" id="delete-loading">
                                <span uk-spinner="ratio: 0.8"></span>
                                <span class="uk-margin-small-right">در حال حذف...</span>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function openDeleteModal(deleteUrl, itemName = 'این آیتم', entityType = 'آیتم') {
            // Set the form action to the delete URL
            document.getElementById('delete-form').action = deleteUrl;

            // Update the modal message with the item name and type
            document.getElementById('delete-modal-message').textContent =
                `آیا مطمئن هستید که می‌خواهید ${entityType} "${itemName}" را حذف کنید؟`;

            // Open the modal
            UIkit.modal('#delete-modal').show();
        }
    </script>
@endpush
