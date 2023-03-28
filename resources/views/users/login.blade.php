<x-users-layout>
    @section('pageTitle', 'Đăng nhập')
    <x-card>
        <header class="text-center">
            <h4 class="text-2xl font-bold uppercase mb-1">
                Đăng nhập
            </h4>
        </header>
        <div class="d-flex justify-content-center">
            <form action="/users/authenticate" method="POST">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4 w-100">
                    <label class="form-label" for="form2Example1">Email</label>
                    <input type="email" id="form2Example1" class="form-control" value="{{old('email')}}"/>
                    @error('email')
                        <p class="text-danger text-sm-start mt-1">{{$message}}</p>
                    @enderror
                </div>
    
                <!-- Password input -->
                <div class="form-outline mb-4 w-100">
                    <label class="form-label" for="form2Example2">Mật khẩu</label>
                    <input type="password" id="form2Example2" class="form-control" value="{{old('password')}}"/>
                    @error('password')
                        <p class="text-danger text-sm-start mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col d-flex justify-content-end pb-3">
                    <!-- Simple link -->
                    <a href="#!">Quên mật khẩu?</a>
                </div>
        
                <!-- Submit button -->
                <div class="d-grid gap-2 py-2">
                    <button class="btn btn-info" type="submit">Đăng nhập</button>
                    <a href="/" class="btn btn-info" role="button">Trang chủ</a>
                </div>
        
                <div class="mt-8 d-flex justify-content-center pt-3">
                    <a href="/register" class="text-primary">
                        Tạo tài khoản
                    </a>
                </div>
            </form>
        </div>
    </x-card>
</x-users-layout>