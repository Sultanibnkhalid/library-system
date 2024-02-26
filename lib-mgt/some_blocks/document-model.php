<div>
    <div class="col-12" id="doc-model" row_id="1">
    <span class="close btn btn-danger" >&times;</span>
    <div class="row g-3">
                <div class="col-md-5 col-lg-4  order-md-last   order-sm-last  order-last  ">
                  <canvas class="my-4 w-100" id="conval" width="100%" height="5"></canvas>


                  <div class="col">
                    <div class="card shadow-sm">
                      <label for="doc_cover_img" class="form-label"> صورة الغلاف للمشروع </label>
                      <img id="doc_cover_img" src="#" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="...">


                    </div>
                  </div>




                  <form class="card p-2">
                    <div class="input-group">
                      <input type="file" id="doc_fileinput" class="form-control" placeholder="اختيار صورة">

                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" id="submit_new_doc">اضافة</button>
                    <button class="w-100 btn  btn-outline-danger cancel btn-lg " >الغاء</button>
                  </form>
                </div>

                <div class="col-md-7 col-lg-8 ">
                  <h4 class="mb-3">بيانات المشروع</h4>
                  <h4 class="mb-3" id="h_error"></h4>
                  <form class="needs-validation" action="#">
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <label for="doc_title" class="form-label">عنوان المشروع</label>
                        <input type="text" class="form-control rq" id="doc_title" placeholder="" required="true">
                        <div class="invalid-feedback">
                          يرجى إدخال الاسم بشكل صحيح.
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label for="doc_author" class="form-label">المؤلف </label>
                        <input type="text" class="form-control rq" id="doc_author" placeholder="" value="" required="true">
                        <div class="invalid-feedback">
                          مطلوب
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="doc_subject" class="form-label">ملخص المشروع</label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="text" multiline="true" class="form-control rq" id="doc_subject" required="true">
                          <div class="invalid-feedback">
                            مطلوب
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-md-3">
                        <label for="doc_abstract" class="form-label">ملخص</label>
                        <input type="text" class="form-control" id="doc_abstract" required="true">
                          <div class="invalid-feedback">
                       
                      </div> -->
                      <div class="col-6">
                        <label for="doc_collage" class="form-label">الكلية</label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <select class="form-select rq" id="doc_collage" required="">

                          </select>
                          <div class="invalid-feedback">
                            مطلوب.
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <label for="doc_publishing_year" class="form-label">سنة النشر </label>
                        <div class="input-group has-validation">
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="date"  class="form-control rq" id="doc_publishing_year" required="true">
                          <div class="invalid-feedback">
                            مطلوب
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="doc_locker_no" class="form-label">مكان المشروع</label>
                        <input type="text" class="form-control" id="doc_locker_no" placeholder="">
                        <div class="invalid-feedback">
                          <!-- مكان -->
                        </div>
                      </div>

                      <div class="col-4">
                        <label for="doc_number_copies" class="form-label">عدد النسخ المطبوعة</label>
                        <input type="number" class="form-control" id="doc_number_copies" required="">
                        <div class="invalid-feedback">
                          <!--  -->
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="doc_pages" class="form-label">صفحات الكتاب</label>
                        <input type="number"  class="form-control" id="doc_pages" required="">
                        <div class="invalid-feedback">
                          <!--  -->
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="doc_status" class="form-label">حالة المشروع</label>
                        <select class="form-select rq" id="doc_status" required="">
                          <option value="0">غير متاح</option>
                          <option value="1">متاح</option>
                        </select>
                        <div class="invalid-feedback">
                          مطلوب
                        </div>
                      </div>

                      <hr class="my-4">

                    </div>
                  </form>
                </div>
              </div>

    </div>
</div>