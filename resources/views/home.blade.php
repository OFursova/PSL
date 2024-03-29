<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome, ') .Auth::user()->name}}!
        </h2>
        @if (auth()->user()->role_id === 2)
        <x-button-link href="/lawyers/{{auth()->user()->id}}/edit" class="bg-yellow-500 hover:bg-yellow-700 active:bg-yellow-900">Edit profile</x-button-link>
        @endif
        </div>
    </x-slot>

    <x-info-card x-data="cases()" x-init="fetchCases()">
        <x-slot name="title">My cases</x-slot>
            <ol class="px-4">
                <template x-if="!nothingToShow" x-for="item in cases" :key="item.id">
                    <li class="list-decimal">
                        <span x-text="item.name"></span>
                        <template x-if="item.name"> on </template>
                        <span class="text-gray-600" x-text="item.description"></span>
                        <template x-if="item.result == 0">
                            <span class="ml-2 px-2 rounded bg-red-400">Lost</span>
                        </template>
                        <template x-if="item.result == 1">
                            <span class="ml-2 px-2 rounded bg-green-400">Won</span>
                        </template>
                    </li>
                </template>
            </ol>
                <template x-if="nothingToShow">
                    <p>Your cases will be shown here</p>
                </template>
    </x-info-card>

<script>
    let id = {{Auth::user()->id}};
    let userRole = {{Auth::user()->role_id}};
    let role;
    if (userRole === 2) role = 'lawyers'
    else if (userRole === 3) role = 'clients'
    else role = '';
    let token = '{{Auth::user()->api_token}}';

        function cases() {
            return {
                cases: [],
                nothingToShow: true,
                fetchCases: function () {
                    this.error = this.cases = null;
                    axios
                        .get('/api/'+role+'/'+id+'?api_token='+token)
                        .then((response) => {
                            console.log(response.data.data.cases);
                            if(response.data.data.cases == false) this.nothingToShow = true;
                            else this.nothingToShow = false;
                            console.log(this.nothingToShow);
                            this.cases = response.data.data.cases;
                        })
                        .catch((error) => {
                            this.error = error.response.data.message || error.message;
                        });
                },
            };
        }
</script>
</x-app-layout>