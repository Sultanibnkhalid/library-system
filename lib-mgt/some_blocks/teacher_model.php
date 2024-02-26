<div>
<div class="col-12">
<span class="close btn btn-danger" >&times;</span>

<div class="row g-3">
                <div class="col-md-5 col-lg-4  order-md-last   order-sm-last  order-last  ">
                  <canvas class="my-4 w-100" id="conval" width="100%" height="5"></canvas>


                  <div class="col">
                    <div class="card shadow-sm">
                      <img id="teacher_img" src="#" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="...">


                    </div>
                  </div>




                  <form class="card p-2">
                    <div class="input-group">
                      <input type="file" accept="image/*"  id="teacher_inputfile" class="form-control" placeholder="اختيار صورة">

                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" id="teacher_submit_button">حفظ التعديل </button>
                    <button class="w-100 btn  btn-outline-danger cancel btn-lg "  >الغاء</button>
                  </form>
                </div>

                <div class="col-md-7 col-lg-8 ">
                  <h4 class="mb-3">تعديل بيانات الاستاذ </h4>
                  <h4 class="mb-3" id="h2_error"></h4>
                  <form class="needs-validation" action="#">
                    <div class="row g-3">
                      <div class="col-sm-12">
                        <label for="teacher_name" class="form-label">الاسم </label>
                        <input type="text" class="form-control  rq" id="teacher_name" placeholder="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال الاسم بشكل صحيح صحيح.
                        </div>
                      </div>
                    </div>


                    <div class="col-12">
                      <label for="teacher_phone" class="form-label">رقم الهاتف</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text">@</span> -->
                        <input type="text" class="form-control  rq" id="teacher_phone" required="true">
                        <div class="invalid-feedback">
                          رقم الهاتف مطلوب.
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <label for="teacher_gander" class="form-label">النوع</label>
                      <select class="form-select" id="teacher_gander" required="">
                        <option value="ذكر">ذكر</option>
                        <option value="انثى">انثى</option>
                      </select>
                      <div class="invalid-feedback">
                        يرجى اختيار النوع بشكل صحيح.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="teacher_email" class="form-label">البريد الإلكتروني <span class="text-muted">(اختياري)</span></label>
                      <input type="email" class="form-control" id="teacher_email" placeholder="you@example.com">
                      <div class="invalid-feedback">
                        يرجى إدخال عنوان بريد إلكتروني صحيح لاستعادة كلمة المرور .
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="teacher_address" class="form-label">العنوان</label>
                      <input type="text" class="form-control" id="teacher_address" placeholder="ذمار شارع رداع" required="">
                      <div class="invalid-feedback">

                      </div>
                    </div>


                    <hr class="my-4">


                  </form>

                </div>
              </div>

</div>

</div>