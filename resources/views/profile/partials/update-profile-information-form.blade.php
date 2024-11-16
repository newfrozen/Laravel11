<section>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>{{ __("Update your account's profile information") }}</h5>
            </div>
            <div class="card-body">
                <p class="mt-1 text-sm text-muted">
                    {{ __("Update your account's profile information, email address, and profile image.") }}
                </p>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    @method('patch')

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <img src="{{ $user->image ? url('storage/' . $user->image) : url('storage/images/default.png') }}"
                                    alt="Profile Image" class="img-thumbnail mb-3" width="150">
                            </div>

                            <div class="form-group">
                                <label for="image" class="form-label">{{ __('Update Profile Image') }}</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if ($errors->has('image'))
                                    <div class="text-danger mt-1">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $user->name) }}" required autofocus>
                                @if ($errors->has('name'))
                                    <div class="text-danger mt-1">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" required>
                                @if ($errors->has('email'))
                                    <div class="text-danger mt-1">{{ $errors->first('email') }}</div>
                                @endif

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                    <div class="mt-2">
                                        <p class="text-muted">
                                            {{ __('Your email address is unverified.') }}
                                            <button form="send-verification"
                                                class="btn btn-link p-0">{{ __('Click here to re-send the verification email.') }}</button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="text-success mt-2">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="nip" class="form-label">{{ __('NIP') }}</label>
                                <input type="text" class="form-control" id="nip" name="nip"
                                    value="{{ old('nip', $user->nip) }}">
                                @if ($errors->has('nip'))
                                    <div class="text-danger mt-1">{{ $errors->first('nip') }}</div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="pangkat" class="form-label">{{ __('Pangkat') }}</label>
                                <select class="form-control" id="pangkat" name="pangkat">
                                    <option value="" disabled>{{ __('Select Pangkat') }}</option>
                                    @foreach (['I/a-Juru Muda', 'I/b-Juru Muda tingkat I', 'I/c-Juru', 'I/d-juru tingkat I', 'II/a-pengatur muda', 'II/b-pengatur muda TK.I', 'II/c-pengatur', 'II/d-pengatur TK.I', 'III/a-penata muda', 'III/b-penata muda TK.I', 'III/c-penata', 'III/d-penata TK.I', 'IV/a-pembina', 'IV/b-Pembina TK.I', 'IV/c-pembina utama muda', 'IV/d-pembina utama madya', 'IV/e-pembina utama', 'V-V', 'VII-VII', 'IX-IX', 'X-X', 'VIII-VIII'] as $rank)
                                        <option value="{{ $rank }}"
                                            {{ old('pangkat', $user->pangkat) === $rank ? 'selected' : '' }}>
                                            {{ $rank }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pangkat'))
                                    <div class="text-danger mt-1">{{ $errors->first('pangkat') }}</div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="unit_kerja" class="form-label">{{ __('Unit Kerja') }}</label>
                                <input type="text" class="form-control" id="unit_kerja" name="unit_kerja"
                                    value="{{ old('unit_kerja', $user->unit_kerja) }}">
                                @if ($errors->has('unit_kerja'))
                                    <div class="text-danger mt-1">{{ $errors->first('unit_kerja') }}</div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="tmt_jabatan" class="form-label">{{ __('TMT Jabatan') }}</label>
                                <input type="date" class="form-control" id="tmt_jabatan" name="tmt_jabatan"
                                    value="{{ old('tmt_jabatan', $user->tmt_jabatan) }}">
                                @if ($errors->has('tmt_jabatan'))
                                    <div class="text-danger mt-1">{{ $errors->first('tmt_jabatan') }}</div>
                                @endif
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                                @if (session('status') === 'profile-updated')
                                    <p class="text-success mb-0">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
