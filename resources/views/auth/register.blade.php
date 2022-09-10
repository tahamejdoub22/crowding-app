<x-guest-layout>
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">sign up</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url({{asset('login11/images/bg-1.jpg')}});">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign up</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
    <x-auth-card>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form  class="signin-form" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group mb-3">
                <x-label  class="label" for="name" :value="__('Name')" />

                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="form-group mb-3">
                <x-label  class="label" for="email" :value="__('Email')" />

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="form-group mb-3">
                <x-label  class="label" for="password" :value="__('Password')" />

                <x-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group mb-3">
                <x-label  class="label" for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="form-control"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <!--select option rol type-->
            <div class="form-group mb-3">
                <x-label  class="label" for="role_id" value="{{_('Register as:') }}"/>
                <select name="role_id" class="block mt-1 w-full border-gray-300 focus:border_indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="admin">admin</option>
                    <option value="projectresponsable">project responsable </option>
                    <option value="projectinvestor">project investor </option>
                </select>
            </div>

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <div class="form-group">
                <x-button class="form-control btn btn-primary rounded submit px-3">
                    {{ __('Register') }}
                </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</div>
</div>
  </div>
</div>
</div>
</section>
</x-guest-layout>
