

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" method="post" action="<?= base_url('auth/registration')?>">
                                    <div class="form-group">
                                        <input type="name" name="name" value="<?= set_value("name")?>" class="form-control form-control-user"
                                            placeholder="Fullname">
                                            <?= form_error('name','<small class="text-danger pl-3">','</small>')?>
                                            
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email"  value="<?= set_value("email")?>" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                            <?= form_error('email','<small class="text-danger pl-3">','</small>')?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password1" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                            <?= form_error('password1','<small class="text-danger pl-3">','</small>')?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password2" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Reapet Password">
                                            <?= form_error('password2','<small class="text-danger pl-3">','</small>')?>
                                    </div>
                                    <button type="submit"  class="btn btn-primary btn-user btn-block">
                                        Register
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth')?>">Sudah punya akun?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

