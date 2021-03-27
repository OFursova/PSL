<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome, ') .Auth::user()->name}}!
        </h2>
    </x-slot>

    <x-info-card x-data="cases()" x-init="fetchCases()">
        <x-slot name="title">My cases:</x-slot>
            <ol class="px-4">
                <template x-for="item in cases" :key="item.id">
                    <template x-if="!item.result">
                        <li class="list-decimal"><span x-text="item.name"></span> <span class="text-gray-600" x-text="item.description"></span></li>
                    </template>
                </template>
            </ol>
                <template x-if="nothingToShow">
                    <p>Your cases will be shown here</p>
                </template>
    </x-info-card>

    <x-info-card x-data="cases()" x-init="fetchCases()">
        <x-slot name="title">My {{Auth::user()->role_id == 3 ? 'lawyers' : 'clients'}}:</x-slot>
        <ol class="px-4">
            <template x-for="item in cases" :key="item.id">
                <template x-if="!item.result">
                    <li class="list-decimal"><span x-text="item.name"></span> <span x-text="item.description"></span></li>
                </template>
            </template>
        </ol>
            <template x-if="nothingToShow">
                <p>Your lawyer will be shown here</p>
            </template>
    </x-info-card>

<script>
    let id = {{Auth::user()->id}};
    let userRole = {{Auth::user()->role_id}};
    let role;
    if (userRole === 2) role = 'lawyers'
    else if (userRole === 3) role = 'clients'
    else role = '';
    
        function cases() {
            return {
                cases: [],
                nothingToShow: true,
                fetchCases: function () {
                    this.error = this.cases = null;
                    axios
                        .get('/api/'+role+'/'+id)
                        .then((response) => {
                            console.log(response.data.data.cases);
                            this.nothingToShow = false;
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