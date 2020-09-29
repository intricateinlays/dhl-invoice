<?php

function to_object($array) {
  return json_decode(json_encode($array));
}

$invoice = json_decode($_GET['invoice']);
$invoice_items = array();

?>

<body onload="window.print();">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"></td>
      <td><?php echo $invoice->company_name; ?></td>
    </tr>
    <tr>
      <td colspan="2">ADDRESS</td>
      <td><?php echo $invoice->company_address; ?></td>
    </tr>
    <tr>
      <td colspan="2">CONTACT#:</td>
      <td>
        <?php echo $invoice->company_contact; ?>
      </td>
    </tr>
    <tr class="text-center">
      <td colspan="11"><h3>INVOICE</h3></td>
    </tr>
    <tr>
      <td>DATE:</td>
      <td></td>
    </tr>
    <tr class="ot">
      <td class="ol" colspan="2">SHIP TO</td>
      <td colspan="5">
        <?php echo $invoice->customer_name; ?><br>
        <?php echo $invoice->customer_address; ?>
      </td>
      <td class="ol or" colspan="4">DELIVERED UNDER</td>
    </tr>
    <tr>
      <td class="ol" colspan="7">&nbsp;</td>
      <td class="ol or" colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td class="ol" colspan="2">CONTACT PERSON</td>
      <td colspan="5"><?php echo $invoice->customer_name; ?></td>
      <td class="ol or" colspan="4"></td>
    </tr>
    <tr>
      <td class="ol ob" colspan="2">PHONE</td>
      <td class="ob" colspan="5">
        <?php echo $invoice->customer_phone; ?> /
        <?php echo $invoice->customer_email; ?>
      </td>
      <td class="ob ol or" colspan="4"></td>
    </tr>
    <!-- <tr><td colspan="9">&nbsp;</td></tr> -->
  </table>

  <br>
  <table cellspacing="0" cellpadding="0">
    <tr class="text-center">
      <td class="ot ol ob">NO ITEM</td>
      <td class="ot ol ob" colspan="3">DESCRIPTION</td>
      <td class="ot ol ob" colspan="2">COUNTRY OF ORIGIN</td>
      <td class="ot ol ob">NET WEIGHT / KG</td>
      <td class="ot ol ob">HS CODE</td>
      <td class="ot ol ob">QTY (PCS)</td>
      <td class="ot ol ob">UNIT PRICE, USD (for customs purpose only)</td>
      <td class="ot ol ob or">TOTAL PRICE, USD (for customs purpose only)</td>
    </tr>

    <?php $total_amount = 0; ?>
    <?php foreach ($invoice->invoice_items as $invoice_item): ?>
      <tr class="text-center">
        <td class="ob ol"><?php echo $invoice_item->quantity; ?></td>
        <td class="ob ol" colspan="3"><?php echo $invoice_item->description; ?></td>
        <td class="ob ol"><?php echo $invoice_item->country_of_origin; ?></td>
        <td class="ob ol"></td>
        <td class="ob ol"></td>
        <td class="ob ol"></td>
        <td class="ob ol"><?php echo $invoice_item->quantity; ?></td>
        <td class="ob ol">
          <?php $amount = $invoice_item->price * $invoice_item->quantity; ?>
          <?php $total_amount += $amount; ?>
          <?php echo number_format($invoice_item->price, 2); ?>
        </td>
        <td class="ob ol or"><?php echo number_format($amount, 2); ?></td>
      </tr>
    <?php endforeach; ?>

    <?php for ($i = 0; $i < 3; $i++): ?>
      <tr>
        <td class="ol">&nbsp;</td>
        <td class="ol" colspan="3">&nbsp;</td>
        <td class="ol">&nbsp;</td>
        <td class="ol">&nbsp;</td>
        <td class="ol">&nbsp;</td>
        <td class="ol">&nbsp;</td>
        <td class="ol">&nbsp;</td>
        <td class="ol">&nbsp;</td>
        <td class="ol or">&nbsp;</td>
      </tr>
    <?php endfor; ?>

    <tr>
      <td class="ol ob ot text-right" colspan="10">USD</td>
      <td class="ol or ot ob text-center"><?php echo number_format($total_amount, 2); ?></td>
    </tr>
    <tr><td colspan="11">&nbsp;</td></tr>
    <tr>
      <td class="ol ot text-right" colspan="4">FREE OF CHARGE DELIVERY REASON<br>FOR EXPORT:</td>
      <td class="ol ot or text-center" colspan="7">PERSONAL</td>
    </tr>
    <tr>
      <td class="ol ot text-right" colspan="4">INSURANCE COST, USD:</td>
      <td class="ol ot or text-center" colspan="7"></td>
    </tr>
    <tr>
      <td class="ol ot ob text-right" colspan="4">TOTAL INVOICE VALUE, USD:</td>
      <td class="ob ot ol"></td>
      <td class="ob ot"></td>
      <td class="ob ot"></td>
      <td class="ob ot"></td>
      <td class="ob ot text-center">USD</td>
      <td class="ob ot text-center"><?php echo number_format($total_amount, 2); ?></td>
      <td class="ob ot or"></td>
    </tr>
    <tr><td colspan="11">&nbsp;</td></tr>
    <tr>
      <td class="ol ot text-right" colspan="4">GROSS WEIGHT, KG (TOTAL):</td>
      <td class="ol ot or text-center" colspan="7"><?php echo $invoice->gross_weight; ?></td>
    </tr>
    <tr>
      <td class="ol ot ob text-right" colspan="4">Signed by:</td>
      <td class="ol ot ob or text-center" colspan="7"></td>
    </tr>
  </table>
</body>

<style>
  body, table {
    font: 10pt arial;
  }
  .text-right {
    text-align: right;
  }
  table {
    width: 100%;
  }
  table td {
    padding: 7px;
    /* border: 1px solid black; */
  }
  .text-center, tr.text-center td {
    text-align: center;
  }
  .ot, tr.ot td {
    border-top: 1px solid black;
  }
  .or, tr.or td {
    border-right: 1px solid black;
  }
  .ob, tr.ob td {
    border-bottom: 1px solid black;
  }
  .ol, tr.ol td {
    border-left: 1px solid black;
  }
</style>
