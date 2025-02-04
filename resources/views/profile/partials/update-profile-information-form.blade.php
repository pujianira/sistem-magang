<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Perbarui informasi profil dan alamat email akun Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <!-- Foto Profil -->
        <div class="flex justify-center mb-6">
            <div class="relative">
                <img id="preview" 
                    src="{{ $user->foto ? asset('img/profil/' . $user->foto) : asset('img/pasfoto.jpg') }}" 
                    alt="fotoprofil" 
                    class="w-40 h-40 border object-cover rounded-lg">
                
                <input type="file" 
                    name="foto" 
                    id="foto" 
                    class="hidden" 
                    accept="image/*" 
                    onchange="previewImage(this)">
                
                <label for="foto" 
                    class="absolute bottom-0 right-0 bg-white p-2 rounded-full shadow cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                </label>
            </div>
        </div>
  
        <!-- Nama -->
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full bg-white" :value="old('nama', $user->nama)" required autofocus autocomplete="nama" />
            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
        </div>

        @if($user->peran === 'Pendaftar')
            <!-- NIK -->
            <div>
                <x-input-label for="nik" :value="__('NIK')" />
                <x-text-input id="nik" name="nik" type="text" class="mt-1 block w-full" :value="old('nik', $user->pendaftar->nik)" />
                <x-input-error class="mt-2" :messages="$errors->get('nik')" />
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full border-gray-300 bg-white text-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="Laki-laki" {{ old('jenis_kelamin', $user->pendaftar->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $user->pendaftar->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
            </div>

            <!-- Agama -->
            <div>
                <x-input-label for="agama" :value="__('Agama')" />
                <x-text-input id="agama" name="agama" type="text" class="mt-1 block w-full" :value="old('agama', $user->pendaftar->agama)" />
                <x-input-error class="mt-2" :messages="$errors->get('agama')" />
            </div>

            <!-- Tempat Lahir -->
            <div>
                <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                <x-text-input id="tempat_lahir" name="tempat_lahir" type="text" class="mt-1 block w-full" :value="old('tempat_lahir', $user->pendaftar->tempat_lahir)" />
                <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                <x-text-input id="tanggal_lahir" name="tanggal_lahir" type="date" class="mt-1 block w-full" :value="old('tanggal_lahir', $user->pendaftar->tanggal_lahir)" />
                <x-input-error class="mt-2" :messages="$errors->get('tanggal_lahir')" />
            </div>

            <!-- Universitas/Sekolah -->
            <div>
                <x-input-label for="universitas_sekolah" :value="__('Universitas/Sekolah')" />
                <x-text-input id="universitas_sekolah" name="universitas_sekolah" type="text" class="mt-1 block w-full" :value="old('universitas_sekolah', $user->pendaftar->universitas_sekolah)" />
                <x-input-error class="mt-2" :messages="$errors->get('universitas_sekolah')" />
            </div>

            <!-- Jurusan -->
            <div>
                <x-input-label for="jurusan" :value="__('Jurusan')" />
                <x-text-input id="jurusan" name="jurusan" type="text" class="mt-1 block w-full" :value="old('jurusan', $user->pendaftar->jurusan)" />
                <x-input-error class="mt-2" :messages="$errors->get('jurusan')" />
            </div>
        @endif

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- No Telepon -->
        <div>
            <x-input-label for="no_hp" :value="__('No Telepon')" />
            <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full" :value="old('no_hp', $user->no_hp)" />
            <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
        </div>

        <!-- Alamat -->
        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <textarea id="alamat" name="alamat" class="mt-1 block w-full border-gray-300 bg-white text-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('alamat', $user->alamat) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    <script>
        // function previewImage() {
        //     const input = document.getElementById('foto');
        //     const preview = document.getElementById('preview');
            
        //     if (input.files && input.files[0]) {
        //         const reader = new FileReader();
                
        //         reader.onload = function(e) {
        //             preview.src = e.target.result;
        //         }
                
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</section>