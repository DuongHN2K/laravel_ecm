<x-users-layout>
    @section('pageTitle', 'Đăng ký thành viên')
    <x-card class="w-50">
        <header class="text-center">
            <h4 class="text-2xl font-bold uppercase mb-1">
                Đăng ký thành viên
            </h4>
        </header>
        <div class="d-flex justify-content-center">
            <form action="/users/authenticate" method="POST">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-2 w-100">
                    <label class="form-label" for="regEmail">Email</label>
                    <input type="email" id="regEmail" class="form-control" name="email" value="{{old('email')}}"/>
                    @error('email')
                        <p class="text-danger text-sm-start mt-1">{{$message}}</p>
                    @enderror
                </div>

                <!-- Phone number input -->
                <div class="form-outline mb-2 w-100">
                    <label class="form-label" for="regPhone">Số điện thoại</label>
                    <input type="text" id="regPhone" class="form-control" name="phone_number" value="{{old('phone_number')}}"/>
                    @error('phone_number')
                        <p class="text-danger text-sm-start mt-1">{{$message}}</p>
                    @enderror
                </div>

                <!-- Name input -->
                <div class="form-outline mb-2 w-100">
                    <label class="form-label" for="regPhone">Họ tên</label>
                    <input type="text" id="regName" class="form-control" name="name" value="{{old('name')}}"/>
                    @error('name')
                        <p class="text-danger text-sm-start mt-1">{{$message}}</p>
                    @enderror
                </div>
    
                <!-- Password input -->
                <div class="form-outline mb-3 w-100">
                    <label class="form-label" for="regPassword">Mật khẩu</label>
                    <input type="password" id="regPassword" class="form-control" name="password" value="{{old('password')}}"/>
                    @error('password')
                        <p class="text-danger text-sm-start mt-1">{{$message}}</p>
                    @enderror
                </div>

                <!-- Password confirm -->
                <div class="form-outline mb-3 w-100">
                    <label class="form-label" for="regPasswordCf">Xác nhận mật khẩu</label>
                    <input type="password" id="regPasswordCf" class="form-control" name="password_cf" value="{{old('password_cf')}}"/>
                    @error('password_cf')
                        <p class="text-danger text-sm-start mt-1">{{$message}}</p>
                    @enderror
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                    aria-describedby="registerCheckHelpText" />
                    <label class="form-check-label" for="registerCheck">
                        Tôi đã đọc và đồng ý với các điều khoản sử dụng
                    </label>
                </div>
        
                <!-- Submit button -->
                <div class="d-grid gap-2 py-2">
                    <button class="btn btn-info" type="submit">Đăng ký</button>
                    <a href="/" class="btn btn-info" role="button">Trang chủ</a>
                </div>

                <div class="mt-8 d-flex justify-content-center pt-3">
                    <a href="/login" class="text-primary">
                        Đăng nhập
                    </a>
                </div>
            </form>
        </div>
    </x-card>
</x-users-layout>