@component('mail::message')
# Case application received

Thank you for choosing Pearson Specter Litt LLC and welcome!<br>
We guarantee providing you high proficiency legal services.<br>
Your case application will be processed within 2 working days and our assistants will contact you to settle formalities and specify the details.

@component('mail::button', ['url' => '/pearson-specter-litt'])
Visit PSL
@endcomponent

Kind regards,<br>
Sarah Paulsen<br>
Senior Assistant, {{ config('app.name') }}
@endcomponent
