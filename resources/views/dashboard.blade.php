<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="px-6 py-3 flex items-start justify-around flex-wrap w-screen">
        <x-admin-block x-data="roles()" x-init="fetchRoles()">
            <x-slot name="title">Roles</x-slot><x-slot name="action">roles</x-slot>
            <ol>
            <template x-if="!nothingToShow" x-for="role in roles" :key="role.id">
                <li class="list-decimal">
                    <span x-text="role.name"></span>
                </li>
            </template>
            </ol>
        </x-admin-block>
        <x-admin-block x-data="permits()" x-init="fetchPermits()">
            <x-slot name="title">Permissions</x-slot><x-slot name="action">permissions</x-slot>
            <ol>
                <template x-if="!nothingToShow" x-for="permit in permits" :key="permit.id">
                    <li class="list-decimal">
                        <span x-text="permit.name"></span>
                    </li>
                </template>
                </ol>
        </x-admin-block>
        <x-admin-block x-data="positions()" x-init="fetchPositions()">
            <x-slot name="title">Positions</x-slot><x-slot name="action">positions</x-slot>
            <ol>
                <template x-if="!nothingToShow" x-for="position in positions" :key="position.id">
                    <li class="list-decimal">
                        <span x-text="position.name"></span>
                    </li>
                </template>
                </ol>
        </x-admin-block>
        <x-admin-block x-data="specs()" x-init="fetchSpecs()">
            <x-slot name="title">Specializations</x-slot><x-slot name="action">specs</x-slot>
            <ol>
                <template x-if="!nothingToShow" x-for="spec in specs" :key="spec.id">
                    <li class="list-decimal">
                        <span x-text="spec.name"></span>
                    </li>
                </template>
                </ol>
        </x-admin-block>
    </div>
            
    <script>
        let token = '{{Auth::user()->api_token}}';

        function roles() {
            return {
                roles: [],
                nothingToShow: true,
                fetchRoles: function () {
                    this.error = this.roles = null;
                    axios
                        .get('/api/roles?api_token='+token)
                        .then((response) => {
                            if(response.data.data == false) this.nothingToShow = true;
                            else this.nothingToShow = false;
                            this.roles = response.data.data;
                        })
                        .catch((error) => {
                            this.error = error.response.data.message || error.message;
                        });
                },
            };
        }

        function permits() {
            return {
                permits: [],
                nothingToShow: true,
                fetchPermits: function () {
                    this.error = this.permits = null;
                    axios
                        .get('/api/permissions?api_token='+token)
                        .then((response) => {
                            if(response.data.data == false) this.nothingToShow = true;
                            else this.nothingToShow = false;
                            this.permits = response.data.data;
                        })
                        .catch((error) => {
                            this.error = error.response.data.message || error.message;
                        });
                },
            };
        }

        function positions() {
            return {
                positions: [],
                nothingToShow: true,
                fetchPositions: function () {
                    this.error = this.positions = null;
                    axios
                        .get('/api/positions?api_token='+token)
                        .then((response) => {
                            if(response.data.data == false) this.nothingToShow = true;
                            else this.nothingToShow = false;
                            this.positions = response.data.data;
                        })
                        .catch((error) => {
                            this.error = error.response.data.message || error.message;
                        });
                },
            };
        }

        function specs() {
            return {
                specs: [],
                nothingToShow: true,
                fetchSpecs: function () {
                    this.error = this.specs = null;
                    axios
                        .get('/api/specializations?api_token='+token)
                        .then((response) => {
                            if(response.data.data == false) this.nothingToShow = true;
                            else this.nothingToShow = false;
                            this.specs = response.data.data;
                        })
                        .catch((error) => {
                            this.error = error.response.data.message || error.message;
                        });
                },
            };
        }
</script>
</x-app-layout>
