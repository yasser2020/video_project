@csrf
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Name</label>
            <input type="text" name="name" value="{{isset($user)?$user->name:''}}" class="form-control">
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email address</label>
            <input type="email" name="email" value="{{isset($user)?$user->email:''}}" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="password" name="password"   class="form-control">
        </div>
    </div>
</div>

