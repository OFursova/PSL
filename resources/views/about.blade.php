<x-guest-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
        @auth
        <x-button-link href="{{asset('/home')}}" class="ml-4 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
            {{ __('Back to Homepage') }}
        </x-button-link>   
        @else      
        <x-button-link href="{{asset('/')}}" class="ml-4 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
            {{ __('Back to Welcomepage') }}
        </x-button-link>
        @endauth
        </div>
    </header>

    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <div class="lg:w-1/3 p-3 w-full">
                <img src="{{asset('images/building.jpg')}}" alt="Pearson Specter Litt Headquarters" class="w-full rounded">
            </div>
            <div class="lg:w-2/3 p-3 w-full">
                <p class="text-justify">
                    Founded in 1988, and located in New York City, <span class="text-indigo-600 text-3xl">Pearson Specter Litt LLC</span> provides a full range of legal assistance and services, thus offering a complete legal help package for both individuals and businesses. With a range of professional staff able to provide assistance in English, Chinese, Farsi and Russian (together with other languages), we are able to provide timely and accurate guidance to all clients, irrespective of nationality.
                </p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:py-6 lg:px-8 lg:flex lg:items-center lg:justify-between bg-gray-150">
            <div class="lg:w-2/3 p-3 w-full">
                <h2 class="text-2xl text-indigo-600">Range of services</h2>
                <p class="py-2 text-justify">
                    We are experienced not only in all types of domestic law matters, but  we are also able to assist with the complete process of establishing a business or commercial presence in the USA. We provide guidance and advice in relation to all relevant property, tax, legal, company formation and banking procedures.
                </p>
                <p class="py-2 text-justify">
                    We also have the capability to undertake credit searches and carry out enquiries relating to prospective commercial partners in the USA and European Union, in order to reduce the risk of entering into unsuitable alliances or partnerships.
                </p>
                <p class="py-2 text-justify">
                    We aim to provide cost-effective approache to the needs of individuals and their families, as well as to businesses and commercial concerns by providing the platform for successful economic activity in the USA for citizens, investors and their associated employers or business ventures.
                </p>
                <p class="py-2 text-justify">
                    <span class="text-indigo-600">Pearson Specter Litt LLC</span> can also provide a professional search and selection of property in the USA for clients. Concierge services in relation to property maintenance, renovation or tenancy are also available.
                </p>
                <p class="py-2 text-justify">
                    With the relevant USA legislation in an ever-changing state of flux, we aim to keep up-to-date with amendments in law and procedure in order to ensure that the advice we give is reliable and compliant with new changes. To this end, our staff undertake regular study and attend training courses to keep abreast of any new developments in law and procedures.
                </p>
            </div>
            <div class="p-3 w-full lg:w-1/3 flex lg:flex-col items-center justify-around">
                <img src="{{asset('images/office.jpg')}}" alt="Pearson Specter Litt Office" class="w-1/2 lg:w-full rounded m-2">
                <img src="{{asset('images/hoffice2.jpg')}}" alt="Pearson Specter Litt Office" class="w-1/2 lg:w-full rounded m-2">
            </div>
        </div>
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
          <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            <span class="block">Pearson Specter Litt LLC</span>
            <span class="block text-indigo-600">Providing professional legal help</span>
          </h2>
          <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
              <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Get legal help
              </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
              <a href="/lawyers" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                Our team
              </a>
            </div>
          </div>
        </div>
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <div class="lg:w-1/3 p-3 w-full">
                <img src="{{asset('images/psl-headq.jpg')}}" alt="Pearson Specter Litt Headquarters" class="w-2/3 rounded mx-auto">
            </div>
            <div class="lg:w-2/3 p-3 w-full">
                <h2 class="text-2xl text-indigo-600">Proficience certification</h2>
                <p class="py-2 text-justify">
                    We are registered with the Office of the Immigration Services Commissioner OISC and provide material assistance in all categories of immigration work, encompassing managed migration, business immigration and EEA applications, nationality and citizenship, lodge appeals at Immigration & Asylum Chambers and other immigration applications. For any complex immigration matters including asylum, human rights applications, domestic violence, all stages of appeals to the Immigration and Asylum Chambers, judicial review cases please contact our sister company LF Legal Ltd. 
                </p>
                <p class="py-2 text-justify">
                    LF Legal Ltd is regulated by the Solicitors Regulation Authority and can also provide legal advice on a wide range of complex legal matters such as litigation, employment, commercial and family law.
                </p>
                <p class="py-2 text-justify">
                    We have a representative office in London, which can assist on relevant documentation and commercial enquiries.
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>