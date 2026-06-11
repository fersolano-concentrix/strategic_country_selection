<x-layouts.admin>
    <div class="max-w-md mx-auto my-12 animate-fadeIn">
    

        <div class="card bg-white shadow-xl border border-base-200 overflow-hidden relative">
            <div class="h-1.5 w-full bg-primary"></div>

            <div class="card-body p-6 space-y-4">
                
                <div class="flex items-center gap-3 pb-3 border-b border-base-100">
                    <div class="w-10 h-10 rounded-xl bg-secondary/5 text-secondary flex items-center justify-center text-lg shadow-inner">
                        <i class="fa-solid fa-shield-halved text-[#007380]"></i>
                    </div>
                    <div>
                        <h2 class="text-md font-bold text-primary uppercase tracking-wide">Update Credentials</h2>
                        <p class="text-[11px] text-base-content/50">Modify the administrative password.</p>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success bg-success/10 text-success border-success/20 text-xs py-2 rounded-lg font-medium flex gap-2">
                        <i class="fa-solid fa-circle-check text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('profile.password.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="form-control">
                        <label class="label pt-0 pb-1">
                            <span class="text-xs font-bold text-neutral-700">Current Secret Password</span>
                        </label>
                        <input type="password" name="current_password" required
                            class="input input-sm input-bordered w-full rounded-lg bg-base-50/30 focus:border-error @error('current_password') input-error @enderror" />
                        @error('current_password')
                            <label class="label py-1">
                                <span class="label-text-alt text-error text-[10px] font-semibold flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                                </span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label pt-0 pb-1">
                            <span class="text-xs font-bold text-neutral-700">New Password</span>
                        </label>
                        <input type="password" name="password" required
                            class="input input-sm input-bordered w-full rounded-lg bg-base-50/30 focus:border-error @error('password') input-error @enderror" />
                        @error('password')
                            <label class="label py-1">
                                <span class="label-text-alt text-error text-[10px] font-semibold flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                                </span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label pt-0 pb-1">
                            <span class="text-xs font-bold text-neutral-700">Confirm New Password</span>
                        </label>
                        <input type="password" name="password_confirmation" required
                            class="input input-sm input-bordered w-full rounded-lg bg-base-50/30 focus:border-error" />
                    </div>

                    <div class="pt-3 border-t border-base-100 flex items-center justify-end gap-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-xs btn-ghost normal-case text-neutral-500 rounded-md">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-xs bg-primary hover:bg-primary/90 text-white border-none font-bold px-4 rounded-md shadow-sm h-8 flex items-center">
                            <i class="fa-solid fa-key mr-1.5 text-xs opacity-80"></i> Update Password
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</x-layouts.admin>