<template>
  <div>
    <div class="card p-4 text-center">
      <h4 class="text-mm">พิพิธภัณฑ์ ชาวบางกอก</h4>
      <div class="text-left">
        <div class="form-group col-md-8">
          <label class>Email</label>
          <div class>
            <input class="form-control" type="text" name="name" />
          </div>
        </div>

        <div class="form-group col-md-8">
          <label class>Phone Number</label>
          <div class>
            <input class="form-control" type="text" name="name" />
          </div>
        </div>

        <div class="form-group col-md-4">
          <label class>วิธีชำระเงิน</label>
          <div class>
            <select name id class="form-control">
              <option value>-- กรุณาเลือก --</option>
              <option value>พร้อมเพย์</option>
              <option value>บัญชีธนาคาร - กสิกรไทย</option>
            </select>
          </div>
        </div>

        <div class="row" style="margin-left:0px;">
          <div class="col-md-4">
            <label class>วันที่ชำระเงิน</label>
            <div class>
              <input type="date" class="form-control" />
            </div>
          </div>
          <div class="col-md-4">
            <label class>เวลาที่ชำระเงิน</label>
            <div class>
              <input type="time" class="form-control" />
            </div>
          </div>
        </div>

        <div class="form-group col-md-4 mt-2">
          <label class>หลักฐานการโอนเงิน</label>
          <div class>
            <button class="btn btn-mm mb-3">Click to upload</button>
            <br />
            <img
              src="https://www.kasikornbank.com/SiteCollectionDocuments/personal/digital-banking/kplus/functions/basic/prompt-pay/img/img-07.png"
              width="100%"
              alt
            />
          </div>
        </div>
        <div class="pt-5">
          <button class="btn btn-mm-i float-right">Confirm</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>
