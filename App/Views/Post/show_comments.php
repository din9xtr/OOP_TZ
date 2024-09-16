  <!-- comments-->
  <section style="background-color: #bacddb;">
            <div class="container my-5 py-5 text-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                        <h4 class="text-body mb-0">Comments (<?= count($comments) ?>)</h4>

                        <?php
                        foreach ($comments as $comment): ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex flex-start">
                                        <div class="w-100">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="text-primary fw-bold mb-0">
                                                    <?= $comment->login ?>
                                                    <span class="text-body ms-2"><?= $comment->text ?></span>
                                                </h6>
                                                <p class="mb-0"><?= $comment->formattedDate ?></p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <?php
                                                if ($user->role === 'admin'): ?>

                                                    <p class="small mb-0">Status :<?= $comment->status ?></p>

                                                    <form id="comment_status_approved" method="post" action="">

                                                        <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
                                                        <input type="hidden" name="comment_status" value="approved">

                                                        <button type="button" class="btn btn-primary status_approved"
                                                            data-id="<?php echo $comment->id; ?>">app</button>

                                                    </form>
                                                    <form id="comment_status_rejected" method="post" action="">

                                                        <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
                                                        <input type="hidden" name="comment_status" value="rejected">

                                                        <button type="button"
                                                            class="btn btn-primary status_rejected">reject</button>

                                                    </form>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div>
                </div>
            </div>
        </section>