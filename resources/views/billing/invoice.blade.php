<div style="padding: 20px">
    <p style="float: right">Date</p>
    <img src="/assets/img/brand/westock_9_72ppp.png" style="width: 300px"/>
    <h5>customer: {{$customer->name}} {{$customer->last_name }}</h5>
    <h5>customer number: #{{$customer->id}}</h5>
    <h5>customer address: {{$customer->country}} {{$customer->state}} {{$customer->city}}</h5>
    <h5>customer zip: {{$customer->zip}}</h5>
    <h5>customer VAT number: {{$customer->vat_number}}</h5>
    <h5>total: {{$amount}}EUR</h5>
    <h5>type: {{$type?"transaction":"add fund"}}</h5>
    <h5>card id: #{{$card_id}}</h5>
    <h5>create date: {{$create_at}}</h5>
</div>