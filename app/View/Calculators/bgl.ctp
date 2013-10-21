<h2 class="section-title">A1C and eAG</h2>

<?php
echo $this->Html->css('a1cpage');
echo $this->Html->css('a1c');
echo $this->Html->script('a1c');

?>

<p>The A1C blood test results are commonly used to help diagnose and manage type 1 and type 2 diabetes.
    A1C test results reflect the average blood sugar (glucose) levels over the past two to three months.
    Most diabetes patients are more familiar with their daily measured glucose levels, and A1C results can be
    converted to an estimated average glucose level (eAG) with the calculator below. An A1C level of less than 7%
    is a common target for diabetes patients.
</p>
<!--main div -->
<div id="main">

    <p>&nbsp;</p>
    <h3>A1C to eAG Calculator</h3>
    <!-- A1C form -->
    <form name = "a1cForm" method="post" action="" >
        <p>Enter A1C or eAG value</p>

        <!-- user information -->
        <div id="user" >

            <p>A1C</p>
            <p>&nbsp;</p>
            <p>
                <label for "a1clevel"><input name="a1clevel" type="number" min="4.0" max="16" step="0.1"
                                             value="" size="5" required="required"  onfocus="color(1)" onblur="deColor(1)" id="1" onchange="a1cToAG(); return false;" /> %</label>
            </p>
            <p>&nbsp;</p>
        </div> <!-- user -->

        <!-- calculator results -->
        <div id="results" >
            <p>Estimated Average Glucose (eAG)</p>
            <p>&nbsp;</p>
            <p>
                <label for "aglevel1"><input name="aglevel1" value="" type="number" min="40" max="400" step="1" size="5"
                                             onfocus="color(2)" onblur="deColor(2)" id="2" onchange="AGmgToA1C(); return false;" /> mg/dL &nbsp;&nbsp;</label>
                <label for "aglevel2"><input name="aglevel2" value="" type="number" min="4.0" max="16" step="0.1" size="5"
                                             onfocus="color(3)" onblur="deColor(3)" id="3" onchange="AGmmolToA1C(); return false;"/>mmol/L</label>
            </p>
        </div> <!-- results -->


        <!-- Message -->
        <div id="message">
            <p>&nbsp;</p>
            <p>Message*</p>
            <p>
                <label><textarea name="message" cols="65" rows="2" id="4"></textarea></label>
            </p>

        </div><!-- requests -->

    </form>

    <p>Formula*</p>
    <p>eAG (mg/dL) = 28.7 x A1C - 46.7</p>
    <p>eAG (mmol/L) = 1.5944 x A1C - 2.5944</p>
    <p>&nbsp;</p>

    <h3>A1C to eAG Conversion Table</h3>
    <div id="ac1table">
        <img src="/img/a1cchart.png"/>

    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <p>* References</p>
    <p><a href="http://care.diabetesjournals.org/content/31/8/1473.full.pdf">
            1. Translating the A1C Assay Into Estimated Average Glucose Values.  Diabetes Care, vol. 31, no. 8, August 2008.</a></p>
    <p><a href="http://labtestsonline.org/understanding/analytes/a1c/tab/test">
            2. American Association for Clinical Chemistry, http://labtestsonline.org/understanding/analytes/a1c/tab/test</a></p>
    <p><a href="http://www.diabetes.org/living-with-diabetes/treatment-and-care/blood-glucose-control/a1c/">
            3. American Diabetes Association, http://www.diabetes.org/living-with-diabetes/treatment-and-care/blood-glucose-control/a1c/</a></p>

    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <div id="footer">
        <span style="font-size:8pt;">Back To <a href="http://met-hilab.bu.edu" target="_blank">MET-HIlab</a></span>
    </div>

</div><!-- main -->
