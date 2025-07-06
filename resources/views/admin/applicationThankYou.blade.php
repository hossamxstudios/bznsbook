<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Application Submitted</title>
    @include('admin.main.meta')
</head>
<body>
    <div class="hk-wrapper hk-pg-auth" data-layout="vertical" data-layout-style="default" data-menu="light" data-footer="simple">
        <div class="hk-pg-wrapper">
            <div class="container-xxl">
                <div class="row">
                    <div class="mx-auto col-sm-12 col-md-8 col-lg-6">
                        <div class="mt-5 card card-border">
                            <div class="p-5 text-center card-body">
                                <div class="mb-5">
                                    <span class="feather-icon text-success" style="font-size: 4rem;">
                                        <i data-feather="check-circle"></i>
                                    </span>
                                </div>
                                <h2 class="mb-4 display-6 fw-bold">Thank You!</h2>
                                <p class="mb-5 fs-5 text-muted">
                                    Your application has been submitted successfully. We will review your application and get back to you soon.
                                </p>
                                <div class="justify-content-center">
                                    <a href="{{ route('admin.career') }}" class="btn btn-primary btn-lg">
                                        <span class="feather-icon me-2">
                                            <i data-feather="arrow-left"></i>
                                        </span>
                                        Back to Careers
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.main.scripts')
    <script>
        if(window.feather) {
            feather.replace();
        }
    </script>
</body>
</html>
