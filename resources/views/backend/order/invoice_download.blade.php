<html>
<head>
    <title>Invoice of </title>
    <style>
        #invoice{
            padding: 30px;
        }
        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }
        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }
        .invoice .company-details {
            text-align: right
        }
        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }
        .invoice .contacts {
            margin-bottom: 20px
        }
        .invoice .invoice-to {
            text-align: left
        }
        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }
        .invoice .invoice-details {
            text-align: right
        }
        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }
        .invoice main {
            padding-bottom: 50px
        }
        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }
        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }
        .invoice main .notices .notice {
            font-size: 1.2em
        }
        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }
        .invoice table td,.invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }
        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }
        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }
        .invoice table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }
        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }
        .invoice table .unit {
            background: #ddd
        }
        .invoice table .total {
            background: #3989c6;
            color: #fff
        }
        .invoice table tbody tr:last-child td {
            border: none
        }
        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }
        .invoice table tfoot tr:first-child td {
            border-top: none
        }
        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }
        .invoice table tfoot tr td:first-child {
            border: none
        }
        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }
        @media print {
            .invoice {
                font-size: 11px!important;
                overflow: hidden!important
            }
            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }
            .invoice>div:last-child {
                page-break-before: always
            }
        }
    </style>
    <script>
        $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data)
            {
                window.print();
                return true;
            }
        });
    </script>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="#" style="width: 3%">
                            <img src="{{asset('frontend/img/heartshop.png')}}" style="width: 45%" data-holder-rendered="true" />
                        </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
{{--                        ......................    site url--}}
                            <a target="_blank" href="{{url('/')}}">
                                Heart Shop
                            </a>
                        </h2>
                        <div>Mirpur, Dhaka 1216</div>
                        <div>+8801686851584</div>
                        <div>raisulhridoy@hotmail.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">{{$customerinfo->first_name.' '.$customerinfo->last_name}}</h2>
                        <div class="address">{{$customerinfo->phone_number}}</div>
                        <div class="email"><a href="mailto:john@example.com">{{$customerinfo->email_address}}</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE {{$orderinfo->id}}</h1>
                        <div class="date">Date/Time of Invoice: {{$orderinfo->created_at}}</div>
                    </div>
                </div>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light" style="color: #0f6674"><strong>SHIPPING INFO:</strong></div>
                        <h2 class="to">{{$shippinginfo->full_name}}</h2>
                        <div class="address">{{$shippinginfo->address}}</div>
                        <div class="address">{{$shippinginfo->phone_number}}</div>
                        <div class="email"><a href="mailto:john@example.com">{{$shippinginfo->email_address}}</a></div>
                    </div>
                    <div class="col invoice-details">
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="text-left">DESCRIPTION</th>
                        <th class="text-right">PRICE</th>
                        <th class="text-right">QUANTITY</th>
                        <th class="text-right">TOTAL</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productinfo as $prod)
                    <tr>
                        <td class="no">{{$loop->index+1}}</td>
                        <td class="text-left"><h3>{{$prod->product_name}}</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
                        <td class="unit">{{$prod->product_price}} TK.</td>
                        <td class="qty">{{$prod->product_quantity}}</td>
                        <td class="total">{{$prod->product_price * $prod->product_quantity}} TK.</td>
                    </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">SUBTOTAL</td>
                        <td>{{$orderinfo->total_price}} TK.</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">SHIPMENT COST</td>
                        <td>0.00</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">GRAND TOTAL</td>
                        <td>{{$orderinfo->total_price}} TK.</td>
                    </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

</body>
</html>
