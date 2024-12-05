@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm order-2 order-sm-1">
                                    <div class="d-flex align-items-start mt-3 mt-sm-0">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xl me-3">
                                                <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle d-block">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div>
                                                <h5 class="font-size-16 mb-1">{{ $profileData->name }}</h5>
                                                <p class="text-muted font-size-13">{{ $profileData->email }}</p>

                                                <div
                                                    class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                    <div><i
                                                            class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{ $profileData->phone }}
                                                    </div>
                                                    <div><i
                                                            class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{ $profileData->address }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-sm-auto order-1 order-sm-2">
                                <div class="d-flex align-items-start justify-content-end gap-2">
                                    <div>
                                        <button type="button" class="btn btn-soft-light"><i class="me-1"></i> Message</button>
                                    </div>
                                    <div>
                                        <div class="dropdown">
                                            <button class="btn btn-link font-size-16 shadow-none text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            </div>

                            {{-- <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab">Post</a>
                            </li>
                        </ul> --}}
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                    <div class="card-body p-4">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">名前</label>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ $profileData->name }}" id="example-text-input">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">メールアドレス</label>
                                            <input class="form-control" type="email" name="email"
                                                value="{{ $profileData->email }}" id="example-text-input">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">電話番号</label>
                                            <input class="form-control" type="text" name="phone"
                                                value="{{ $profileData->phone }}" id="example-text-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">アドレス</label>
                                            <input class="form-control" type="text" name="address"
                                                value="{{ $profileData->address }}" id="example-text-input">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">プロフィール画像</label>
                                            <input class="form-control" type="file" name="photo" id="image">
                                        </div>
                                        <div class="mb-3 showImageWrap rounded-circle p-1 bg-primary">
                                            <img id="showImage"
                                                 src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                                 alt="現在のプロフィール画像" class="">
                                        </div>
                                        {{-- <div class="mb-3 showImageWrap">
                                            <img id="showImage"
                                                src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                                alt="現在のプロフィール画像" class="img-fluid "
                                                width="110">
                                        </div> --}}
                                        <div class="mt-4">
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">更新する</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">About</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="pb-3">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <div>
                                                    <h5 class="font-size-15">Bio :</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl">
                                                <div class="text-muted">
                                                    <p class="mb-2">Hi I'm Phyllis Gatlin, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
                                                    <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at it has a more-or-less normal distribution of letters</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-3">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <div>
                                                    <h5 class="font-size-15">Experience :</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl">
                                                <div class="text-muted">
                                                    <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc</p>

                                                    <ul class="list-unstyled mb-0">
                                                        <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Donec vitae sapien ut libero venenatis faucibus</li>
                                                        <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Quisque rutrum aenean imperdiet</li>
                                                        <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Integer ante a consectetuer eget</li>
                                                        <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Phasellus nec sem in justo pellentesque</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0">Post</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="#post">View All</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="card p-1 mb-xl-0">
                                                <div class="p-3">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <h5 class="font-size-15 text-truncate"><a href="#" class="text-body">Beautiful Day with Friends</a></h5>
                                                            <p class="font-size-13 text-muted mb-0">10 Apr, 2020</p>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <div class="dropdown">
                                                                <a class="btn btn-link text-muted font-size-16 p-1 py-0 dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="position-relative">
                                                    <img src="assets/images/small/img-3.jpg" alt="" class="img-thumbnail">
                                                </div>

                                                <div class="p-3">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Project
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 12 Comments
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <p class="text-muted">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p>

                                                    <div>
                                                        <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-xl-4">
                                            <div class="card p-1 mb-xl-0">
                                                <div class="p-3">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <h5 class="font-size-15 text-truncate"><a href="#" class="text-body">Drawing a sketch</a></h5>
                                                            <p class="font-size-13 text-muted mb-0">24 Mar, 2020</p>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <div class="dropdown">
                                                                <a class="btn btn-link text-muted font-size-16 p-1 py-0 dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="position-relative">
                                                    <img src="assets/images/small/img-1.jpg" alt="" class="img-thumbnail">
                                                </div>

                                                <div class="p-3">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Development
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 08 Comments
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <p class="text-muted">At vero eos et accusamus et iusto odio dignissimos ducimus quos</p>

                                                    <div>
                                                        <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        <!-- end col -->

                                        <div class="col-xl-4">
                                            <div class="card p-1 mb-sm-0">
                                                <div class="p-3">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <h5 class="font-size-15 text-truncate"><a href="#" class="text-body">Project discussion with team</a></h5>
                                                            <p class="font-size-13 text-muted mb-0">20 Mar, 2020</p>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <div class="dropdown">
                                                                <a class="btn btn-link text-muted font-size-16 p-1 py-0 dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="position-relative">
                                                    <img src="assets/images/small/img-5.jpg" alt="" class="img-thumbnail">
                                                </div>

                                                <div class="p-3">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Project
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 08 Comments
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <p class="text-muted">Itaque earum rerum hic tenetur a sapiente delectus ut aut</p>

                                                    <div>
                                                        <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end tab pane -->

                    <div class="tab-pane" id="about" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">About</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="pb-3">
                                        <h5 class="font-size-15">Bio :</h5>
                                        <div class="text-muted">
                                            <p class="mb-2">Hi I'm Phyllis Gatlin, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
                                            <p class="mb-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at it has a more-or-less normal distribution of letters</p>
                                            <p>It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth.</p>

                                            <ul class="list-unstyled mb-0">
                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Donec vitae sapien ut libero venenatis faucibus</li>
                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Quisque rutrum aenean imperdiet</li>
                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Integer ante a consectetuer eget</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="pt-3">
                                        <h5 class="font-size-15">Experience :</h5>
                                        <div class="text-muted">
                                            <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc</p>

                                            <ul class="list-unstyled mb-0">
                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Donec vitae sapien ut libero venenatis faucibus</li>
                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Quisque rutrum aenean imperdiet</li>
                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Integer ante a consectetuer eget</li>
                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Phasellus nec sem in justo pellentesque</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end tab pane -->

                    <div class="tab-pane" id="post" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Post</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-8">


                                            <div class="mt-5">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-15 text-truncate"><a href="#" class="text-body">Project discussion with team</a></h5>
                                                        <p class="font-size-13 text-muted mb-0">24 Mar, 2020</p>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <div class="dropdown">
                                                            <a class="btn btn-link text-muted font-size-16 p-1 py-0 dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="pt-3">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Development
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 08 Comments
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <p class="text-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>

                                                    <div>
                                                        <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end post -->

                                            <hr class="my-5">

                                            <div>
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-15 text-truncate"><a href="#" class="text-body">Beautiful Day with Friends</a></h5>
                                                        <p class="font-size-13 text-muted mb-0">10 Apr, 2020</p>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <div class="dropdown">
                                                            <a class="btn btn-link text-muted font-size-16 p-1 py-0 dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="position-relative mt-3">
                                                    <img src="assets/images/small/img-3.jpg" alt="" class="img-thumbnail">
                                                </div>

                                                <div class="pt-3">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Project
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 12 Comments
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <p class="text-muted">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, aliquam quaerat voluptatem. Ut enim ad minima veniam, quis</p>

                                                    <div>
                                                        <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end post -->

                                            <hr class="my-5">

                                            <div>
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-15 text-truncate"><a href="#" class="text-body">Drawing a sketch</a></h5>
                                                        <p class="font-size-13 text-muted mb-0">20 Mar, 2020</p>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <div class="dropdown">
                                                            <a class="btn btn-link text-muted font-size-16 p-1 py-0 dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pt-3">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Project
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item me-3">
                                                            <a href="javascript: void(0);" class="text-muted">
                                                                <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 12 Comments
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <p class="text-muted">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, aliquam quaerat voluptatem. Ut enim ad minima veniam, quis</p>

                                                    <div>
                                                        <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end post -->
                                        </div>
                                        <!-- end col -->

                                    </div>
                                    <!-- end row -->

                                    <div class="row g-0 mt-4">
                                        <div class="col-sm-6">
                                            <div>
                                                <p class="mb-sm-0">Showing 1 to 10 of 57 entries</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="float-sm-end">
                                                <ul class="pagination mb-sm-0">
                                                    <li class="page-item disabled">
                                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="#" class="page-link">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">4</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">5</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end tab pane -->
                </div> --}}
                    <!-- end tab content -->
                </div>
                <!-- end col -->

                {{-- <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Skills</h5>

                        <div class="d-flex flex-wrap gap-2 font-size-16">
                            <a href="#" class="badge bg-primary-subtle text-primary">Photoshop</a>
                            <a href="#" class="badge bg-primary-subtle text-primary">illustrator</a>
                            <a href="#" class="badge bg-primary-subtle text-primary">HTML</a>
                            <a href="#" class="badge bg-primary-subtle text-primary">CSS</a>
                            <a href="#" class="badge bg-primary-subtle text-primary">Javascript</a>
                            <a href="#" class="badge bg-primary-subtle text-primary">Php</a>
                            <a href="#" class="badge bg-primary-subtle text-primary">Python</a>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Portfolio</h5>

                        <div>
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-web text-primary me-1"></i> Website</a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-note-text-outline text-primary me-1"></i> Blog</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Similar Profiles</h5>

                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="font-size-14 mb-1">James Nix</h5>
                                            <p class="font-size-13 text-muted mb-0">Full Stack Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="img-thumbnail rounded-circle">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="font-size-14 mb-1">Darlene Smith</h5>
                                            <p class="font-size-13 text-muted mb-0">UI/UX Designer</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0 me-3">
                                        <div class="avatar-title bg-light-subtle text-light rounded-circle font-size-22">
                                            <i class="bx bxs-user-circle"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="font-size-14 mb-1">William Swift</h5>
                                            <p class="font-size-13 text-muted mb-0">Backend Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div> --}}
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <script type="text/javascript">
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!validTypes.includes(file.type)) {
                alert('無効な画像形式です。JPEGまたはPNGファイルを選択してください。');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('showImage').setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection