<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>{{ $data['name'] }}</h3>
                <pre>
        email:{{ $data['email'] }}
<br /><br />
Date: 2018-01-01
phone no: {{ $data['phone'] }}
Status: Paid
</pre>


            </td>
            <td align="center">
                <img src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/home/shells-logo.png" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3> <img src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/home/kjc-logo-black.png" alt="Logo" width="64" class="logo"/></h3>
                <pre>
                    Kristu Jayanti College
                    K Narayanapura,Kothannur
                    Banglore 560077
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Invoice specification #{{ $data['username'] }}</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>Description</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Student Participation Fee</td>
            <td>{{  $data['studentfee']/120  }}</td>
            <td align="left">{{  $data['studentfee']  }}</td>
        </tr>
        <tr>
            <td>Coding Participation Fee</td>
            <td>{{  $data['codingfee']/200  }}</td>
            <td align="left">{{  $data['codingfee']  }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">{{  $data['studentfee']+$data['codingfee']  }}</td>
        </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Company Slogan
            </td>
        </tr>

    </table>
</div>
</body>
</html>