<div >
    <div class="col-12">
    <span class="close btn btn-danger" >&times;</span>
    <div class="row g-3">
                <div class="col-md-5 col-lg-4  order-md-last   order-sm-last  order-last  ">
                  <canvas class="my-4 w-100" id="conval" width="100%" height="5"></canvas>



                  <div class="col">
                    <div class="card shadow-sm">
                      <img id="user_img" src="#" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="...">


                    </div>
                  </div>




                  <form class="card p-2">

                    <div class="input-group">
                      <input type="file" accept="image/*"  id="user_inputfile" class="form-control" placeholder="اختيار صورة">

                    </div>


                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" id="user_submit_button">حفظ التعديل</button>
                    <button class="w-100 btn  btn-outline-danger cancel btn-lg " >الغاء</button>
                  </form>
                </div>

                <div class="col-md-7 col-lg-8 ">
                  <h4 class="mb-3">نموذج بيانات الموضف </h4>
                  <h4 class="mb-3" id="h3_error"></h4>
                  <form class="needs-validation" action="#">
                    <div class="row g-3">
                      <div class="col-sm-12">
                        <label for="user_name" class="form-label">الاسم </label>
                        <input type="text" class="form-control  rq" id="user_name" placeholder="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال الاسم بشكل صحيح صحيح.
                        </div>
                      </div>
                      <!-- add pattern to this input -->
                      <div class="col-sm-12">
                        <label for="user_phone" class="form-label">رقم الهاتف</label>
                        <input type="number" class="form-control  rq" id="user_phone" placeholder="" value="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال رقم الهاتف بشكل صحيح.
                        </div>
                      </div>
                    </div>

                    <!-- <div class="col-md-6">
                      <label for="user_gander" class="form-label">النوع</label>
                      <select class="form-select" id="user_gander" required="">
                        <option value="ذكر">ذكر</option>
                        <option value="انثى">انثى</option>
                      </select>
                      <div class="invalid-feedback">
                        يرجى اختيار النوع بشكل صحيح.
                      </div>
                    </div> -->

                    <div class="col-12">
                      <label for="user_email" class="form-label">البريد الإلكتروني <span class="text-muted">(مطلوب)</span></label>
                      <input type="email" class="form-control  rq" id="user_email" placeholder="you@example.com">
                      <div class="invalid-feedback">
                        يرجى إدخال عنوان بريد إلكتروني صحيح للتواصل.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="NameOfUser" class="form-label">الاسم الوضيفي</label>
                      <input type="text" class="form-control  rq" id="NameOfUser" required="true">
                      <div class="invalid-feedback">
                        يرجى ادخال الاسم الوضيفي
                      </div>
                    </div>
                    <!-- <div class="col-12">
                      <label for="user_address" class="form-label">العنوان</label>
                      <input type="text" class="form-control" id="user_address" placeholder="ذمار شارع رداع" required="">
                      <div class="invalid-feedback">

                      </div>
                    </div> -->


                    <hr class="my-4">



                  </form>
                </div>
              </div>
    </div>
</div>