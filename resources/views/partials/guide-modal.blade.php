<!-- Prompt Guide Modal -->
<div id="prompt-guide-modal" uk-modal>
    <div class="uk-modal-dialog uk-border-rounded uk-box-shadow-xlarge uk-width-1-1 uk-width-2xlarge@m"
        style="max-height: 90vh; display: flex; flex-direction: column; overflow: hidden;">
        <!-- Close Button -->
        <button class="uk-modal-close-default" type="button" uk-close></button>

        <!-- Modal Header -->
        <div class="uk-padding-small uk-light" style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
            <h3 class="uk-modal-title uk-text-bold uk-flex uk-flex-middle uk-margin-remove">
                <span uk-icon="icon: clipboard; ratio: 1.5" class="uk-margin-small-left"></span>
                راهنمای استفاده از پرامپت کپی‌شده
            </h3>
        </div>

        <!-- Scrollable Content -->
        <div class="uk-padding uk-overflow-auto" style="flex: 1; min-height: 0;">
            <!-- Intro Alert -->
            <div class="uk-alert-success uk-border-rounded uk-margin-bottom" uk-alert>
                <p class="uk-text-small uk-margin-remove">
                    پرامپت با موفقیت کپی شد. حالا مراحل زیر را برای استفاده از آن دنبال کنید.
                </p>
            </div>

            <!-- Step 1 -->
            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-margin-bottom">
                <h4 class="uk-card-title uk-text-bold">
                    <span class="uk-badge uk-background-secondary uk-margin-small-left">۱</span>
                    رفتن به برنامه مقصد
                </h4>
                <div class="uk-flex uk-flex-middle uk-margin-small-top">
                    <img src="placeholder-app-icon.png" width="60" height="60"
                        class="uk-border-rounded uk-box-shadow-small uk-margin-small-left" alt="App Icon" />
                    <p class="uk-margin-remove">سایت یا برنامه‌ای که می‌خواهید پرامپت را در آن وارد کنید باز کنید.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-margin-bottom">
                <h4 class="uk-card-title uk-text-bold">
                    <span class="uk-badge uk-background-primary uk-margin-small-left">۲</span>
                    کلیک در ناحیه ورودی متن
                </h4>
                <p class="uk-margin-small-bottom">روی بخش ورودی یا چت نرم‌افزار مورد نظر کلیک کنید تا آماده وارد کردن
                    متن شود.</p>
                <div class="uk-text-center">
                    <span uk-icon="icon: pencil; ratio: 1.5"></span>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-margin-bottom">
                <h4 class="uk-card-title uk-text-bold">
                    <span class="uk-badge uk-background-primary uk-margin-small-left">۳</span>
                    جای‌گذاری (Paste) پرامپت
                </h4>
                <div class="uk-text-center uk-margin-top">
                    <span uk-icon="icon: keyboard; ratio: 2"></span>
                    <div class="uk-text-meta uk-margin-small-top">Ctrl + V یا ⌘ + V</div>
                </div>
                <div class="uk-alert-primary uk-border-rounded uk-margin-top" uk-alert>
                    <p class="uk-text-small uk-margin-remove">
                        با استفاده از کلیدهای بالا، متن را در محل دلخواه جای‌گذاری کنید.
                    </p>
                </div>
            </div>

            <!-- Step 4 (Optional) -->
            <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-margin-bottom">
                <h4 class="uk-card-title uk-text-bold">
                    <span class="uk-badge uk-background-primary uk-margin-small-left">۴</span>
                    بررسی و ارسال پرامپت
                </h4>
                <p>مطمئن شوید متن به درستی وارد شده و سپس آن را ارسال کنید تا پاسخ دریافت شود.</p>
                <div class="uk-text-center">
                    <span uk-icon="icon: check; ratio: 1.5"></span>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="uk-background-muted uk-padding uk-padding-remove-top">
            <div class="uk-flex uk-flex-between uk-flex-middle" uk-grid>
                <div>
                    <button class="uk-button uk-button-text uk-text-muted"
                        onclick="UIkit.modal('#prompt-guide-modal').show()">
                        <span uk-icon="icon: refresh" class="uk-margin-small-left"></span>
                        نمایش دوباره راهنما
                    </button>
                </div>
                <div>
                    <button class="uk-button uk-button-primary" onclick="UIkit.modal('#image-modal').show()">
                        متوجه شدم <span uk-icon="icon: happy"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
