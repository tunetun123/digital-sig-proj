<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman <?= $data['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            <form class="mb-3 mt-md-4" action="<?= BASEURL; ?>/auth" method="POST">
                                <h2 class="fw-bold mb-2 text-uppercase ">Login</h2>
                                <p class=" mb-5">Please enter your username and password!</p>
                                <div class="mb-3">
                                    <label for="email" class="form-label ">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com">
                                    <span class="invalidFeedback">
                                        <?php echo $data['usernameError']; ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="*******">
                                    <span class="invalidFeedback">
                                        <?php echo $data['passwordError']; ?>
                                    </span>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-outline-dark" type="submit" id="submit" value="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>