<h2>Edit Patient</h2>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>

    <link href="style.css" rel="stylesheet" type="text/css" />

    <link href="Update.css" rel="stylesheet" type="text/css" />

    <!--[if lt IE 7]>
	<script type="text/javascript" src="js/ie_png.js"></script>
	<script type="text/javascript">
		 ie_png.fix('.png, #header .row-2 ul li a, #content, .list li');
	</script>
<![endif]-->
  </head>
  <body>
    <div class="tail-top">
      <div class="tail-bottom">
        <div class="body-bg">
          <div id="content">
            <div class="inner_copy">
              More <a href="http://www.templates.com/">Website Templates</a> @ Templates.com!
            </div>
            <div class="tail-right">
              <div class="wrapper">
                <div class="col-1">
                  <div class="indent">
                    <h3 style="color:#808080">Update</h3>
                    <form id="contacts-form" action="">
                      <fieldset>
                        <h2 class="section-title">Update Patient</h2>
                        <form class="form-horizontal" role="form" action="/patients/search" method="post">
                          <div class="form-group">
                            <label class="col-lg-1 control-label" for="Patient_Name">Name</label>
                            <div class="col-lg-2">

                              <input id="Update_Name" name="Update_FirstName" type="Patient_FirstName" placeholder="First Name" class="form-control">   
  </div>
                            <div class="col-lg-2">
                              <input id="Update_MiddleName1" name="Update_MiddleName" type="Patient_MiddleName" placeholder="Middle Name" class="form-control">   
  </div>
                            <div class="col-lg-2">
                              <input id="Update_LastName1" name="Update_LastName" type="Patient_LastName" placeholder="Last Name" class="form-control">   
  </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-1 control-label" for="Update_Birthday">Birthday</label>
                            <div class="col-lg-4">
                              <input id="Update_Birthday" name="Update_Birthday" type="text" class="form-control" onClick="getDateString(this, oCalendarEn)" value="MM / DD / YYYY">   
  </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-1 control-label" for="Update_Gender">Gender</label>
                            <div class="col-lg-4">
                              <select id="Update_Gender" name="Update_Gender" class="form-control">
                                <option></option>
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-1 control-label" for="Update_Occupation">Occupation</label>
                            <div class="col-lg-4">
                              <input id="Update_Occupation" name="Update_Occupation" type="text" placeholder="Occupation" class="form-control">
    
  </div>
                          </div>


                          <div class="form-group">
                            <label class="col-lg-1 control-label" for="Update_Race">Race</label>
                            <div class="col-lg-4">
                              <select id="Update_Race" name="Update_Race" class="form-control">
                                <option></option>
                                <option></option>
                                <option></option>

                                <option></option>
                              </select>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="col-lg-1 control-label" for="Update_Street">Address</label>
                            <div class="col-lg-4">
                              <input id="Update_Street" name="Update_Street" type="text" placeholder="Street Address" class="form-control">
    
  </div>
                          </div>


                          <div class="form-group">
                            <label class="col-lg-1 control-label" for="Update_City">City</label>
                            <div class="col-lg-4">
                              <input id="UpdatePatient_City" name="Update_City" type="text" placeholder="City Name" class="form-control">
    
  </div>
                          </div>


                          <div class="form-group">
                            <label class="col-lg-1 control-label" for="Update_State">State</label>
                            <div class="col-lg-4">
                              <input id="Update_State" name="Update_State" type="text" placeholder="State Name" class="form-control">
    
  </div>
                          </div>


                          <div class="form-group">
                            <label class="col-lg-1 control-label" for="Update_ZIP">ZIP</label>
                            <div class="col-lg-4">
                              <input id="Update_ZIP" name="Update_ZIP" type="text" placeholder="Zipcode" class="form-control">
    
  </div>
                          </div>


                          <div class="form-group">
                            <label class="col-lg-1 control-label" for="Update_Country">Country</label>
                            <div class="col-lg-4">
                              <select id="Update_Country" name="Update_Country" class="form-control">
                                <option value=""></option>
                                <option value="AR">Argentina</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BR">Brazil</option>
                                <option value="BG">Bulgaria</option>
                                <option value="CA">Canada</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CO">Colombia</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EG">Egypt</option>
                                <option value="EE">Estonia</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="HK">Hong Kong S.A.R., China</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Laos</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MK">Macedonia</option>
                                <option value="MY">Malaysia</option>
                                <option value="MT">Malta</option>
                                <option value="MX">Mexico</option>
                                <option value="MD">Moldova</option>
                                <option value="MC">Monaco</option>
                                <option value="ME">Montenegro</option>
                                <option value="MA">Morocco</option>
                                <option value="NL">Netherlands</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="KP">North Korea</option>
                                <option value="NO">Norway</option>
                                <option value="PK">Pakistan</option>
                                <option value="PS">Palestinian Territory</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russia</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="RS">Serbia</option>
                                <option value="SG">Singapore</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="ZA">South Africa</option>
                                <option value="KR">South Korea</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="TW">Taiwan</option>
                                <option value="TH">Thailand</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">USA</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VN">Vietnam</option>
                              </select>
                            </div>
                          </div>


                          <div class="control-group">
                            <label class="col-lg-1 control-label" for="singlebutton"></label>
                            <div class="col-lg-4">
                              <button id="UpdatePatient" name="UpdatePatient" class="btn btn-primary">Update</button>
                            </div>
                          </div>


                        </form>
                        <script>
                          function PopupCalendar(InstanceName) {
                          ///Global Tag
                          this.instanceName = InstanceName;
                          ///Properties
                          this.separator = "-"
                          this.oBtnTodayTitle = "Today"
                          this.oBtnCancelTitle = "Cancel"
                          this.weekDaySting = new Array("S", "M", "T", "W", "T", "F", "S");
                          this.monthSting = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                          this.Width = 200;
                          this.currDate = new Date();
                          this.today = new Date();
                          this.startYear = 1970;
                          this.endYear = 2013;
                          ///Css
                          this.divBorderCss = "1px solid #BCD0DE";
                          this.tableBorderColor = "#CCCCCC"
                          ///Method
                          this.Init = CalendarInit;
                          this.Fill = CalendarFill;
                          this.Refresh = CalendarRefresh;
                          this.Restore = CalendarRestore;
                          ///HTMLObject
                          this.oTaget = null;
                          this.oPreviousCell = null;
                          this.sDIVID = InstanceName + "oDiv";
                          this.sTABLEID = InstanceName + "oTable";
                          this.sMONTHID = InstanceName + "oMonth";
                          this.sYEARID = InstanceName + "oYear";
                          }
                          function CalendarInit()				///Create panel
                          {
                          var sMonth, sYear
                          sMonth = this.currDate.getMonth();
                          sYear = this.currDate.getYear();
                          htmlAll = "<div id='" + this.sDIVID + "' style='display:none;position:absolute;width:" + this.Width + ";border:" + this.divBorderCss + ";padding:2px;background-color:#FFFFFF'>
                            ";
                            htmlAll += "<div align='center'>
                              ";
                              /// Month
                              htmloMonth = "<select id='" + this.sMONTHID + "' onchange=CalendarMonthChange(" + this.instanceName + ") style='width:50%'>
                                ";
                                for (i = 0; i < 12; i++) {
            htmloMonth += "<option value='" + i + "'>" + this.monthSting[i] + "</option>";
                                }
                                htmloMonth += "
                              </select>";
                              /// Year
                              htmloYear = "<select id='" + this.sYEARID + "' onchange=CalendarYearChange(" + this.instanceName + ") style='width:50%'>
                                ";
                                for (i = this.startYear; i <= this.endYear; i++) {
                                htmloYear += "<option value='" + i + "'>" + i + "</option>";
                                }
                                htmloYear += "
                              </select>
                            </div>";
                            /// Day
                            htmloDayTable = "<table id='" + this.sTABLEID + "' width='100%' border='0' cellpadding='0' cellspacing='1' bgcolor='" + this.tableBorderColor + "'>
                              ";
                              htmloDayTable += "<tbody bgcolor='#ffffff'style='font-size:13px'>
                                ";
                                for (i = 0; i <= 6; i++) {
                                if (i == 0)
                                htmloDayTable += "<tr bgcolor='#98B8CD'>
                                  ";
                                  else
                                  htmloDayTable += "<tr>
                                    ";
                                    for (j = 0; j < 7; j++) {
                if (i == 0) {
                    htmloDayTable += "<td height='20' align='center' valign='middle' style='cursor:hand'>
                                      ";
                                      htmloDayTable += this.weekDaySting[j] + "
                                    </td>"
                                    }
                                    else {
                                    htmloDayTable += "<td height='20' align='center' valign='middle' style='cursor:hand'
                   onmouseover='CalendarCellsMsOver'
                   onmouseout='CalendarCellsMsOut'
                   onclick=CalendarCellsClick(this," + this.instanceName + ")>
                                      ";
                                      htmloDayTable += "
                                    </td>"
                                    }
                                    }
                                    htmloDayTable += "
                                  </tr>";
                                  }
                                  htmloDayTable += "
                                </tbody>
                            </table>";
                            /// Today Button
                            htmloButton = "<div align='center' style='padding:3px'>
                              "
                              htmloButton += "<button style='width:40%;border:1px solid #BCD0DE;background-color:#eeeeee;cursor:hand'
               onclick=CalendarTodayClick(" + this.instanceName + ")>" + this.oBtnTodayTitle + "</button> "
                              htmloButton += "<button style='width:40%;border:1px solid #BCD0DE;background-color:#eeeeee;cursor:hand'
               onclick=CalendarCancel(" + this.instanceName + ")>" + this.oBtnCancelTitle + "</button> "
                              htmloButton += "
                            </div>"
                            /// All
                            htmlAll = htmlAll + htmloMonth + htmloYear + htmloDayTable + htmloButton + "
                          </div>";
                          document.write(htmlAll);
                          this.Fill();
                          }
                          function CalendarFill()			///
                          {
                          var sMonth, sYear, sWeekDay, sToday, oTable, currRow, MaxDay, sDaySn, sIndex, rowIndex, cellIndex, oSelectMonth, oSelectYear
                          sMonth = this.currDate.getMonth();
                          sYear = this.currDate.getYear();
                          sWeekDay = (new Date(sYear, sMonth, 1)).getDay();
                          sToday = this.currDate.getDate();
                          oTable = document.all[this.sTABLEID];
                          currRow = oTable.rows[1];
                          MaxDay = CalendarGetMaxDay(sYear, sMonth);
                          oSelectMonth = document.all[this.sMONTHID]
                          oSelectMonth.selectedIndex = sMonth;
                          oSelectYear = document.all[this.sYEARID]
                          for (i = 0; i < oSelectYear.length; i++) {
            if (parseInt(oSelectYear.options[i].value) == sYear) oSelectYear.selectedIndex = i;
        }
        ////
        for (sDaySn = 1, sIndex = sWeekDay; sIndex <= 6; sDaySn++, sIndex++) {
                          if (sDaySn == sToday) {
                          currRow.cells[sIndex].innerHTML = "<font color="red">
                            <i>
                              <b>" + sDaySn + "</b>
                            </i>
                          </font>";
                          this.oPreviousCell = currRow.cells[sIndex];
                          }
                          else {
                          currRow.cells[sIndex].innerHTML = sDaySn;
                          currRow.cells[sIndex].style.color = "#666666";
                          }
                          CalendarCellSetCss(0, currRow.cells[sIndex]);
                          }
                          for (rowIndex = 2; rowIndex <= 6; rowIndex++) {
                          if (sDaySn > MaxDay) break;
                          currRow = oTable.rows[rowIndex];
                          for (cellIndex = 0; cellIndex < currRow.cells.length; cellIndex++) {
                if (sDaySn == sToday) {
                    currRow.cells[cellIndex].innerHTML = "<font color="red">
                            <i>
                              <b>" + sDaySn + "</b>
                            </i>
                          </font>";
                          this.oPreviousCell = currRow.cells[cellIndex];
                          }
                          else {
                          currRow.cells[cellIndex].innerHTML = sDaySn;
                          currRow.cells[cellIndex].style.color = "#666666";
                          }
                          CalendarCellSetCss(0, currRow.cells[cellIndex]);
                          sDaySn++;
                          if (sDaySn > MaxDay) break;
                          }
                          }
                          }
                          function CalendarRestore()					/// Clear Data
                          {
                          var oTable
                          oTable = document.all[this.sTABLEID]
                          for (i = 1; i < oTable.rows.length; i++) {
            for (j = 0; j < oTable.rows[i].cells.length; j++) {
                CalendarCellSetCss(0, oTable.rows[i].cells[j]);
                oTable.rows[i].cells[j].innerHTML = " ";
            }
        }
    }
    function CalendarRefresh(newDate)					///
    {
        this.currDate = newDate;
        this.Restore();
        this.Fill();
    }
    function CalendarCellsMsOver(oInstance)				/// Cell MouseOver
    {
        var myCell
        myCell = event.srcElement;
        CalendarCellSetCss(0, oInstance.oPreviousCell);
        if (myCell) {
            CalendarCellSetCss(1, myCell);
            oInstance.oPreviousCell = myCell;
        }
    }
    function CalendarCellsMsOut(oInstance)				////// Cell MouseOut
    {
        var myCell
        myCell = event.srcElement;
        CalendarCellSetCss(0, myCell);
    }
    function CalendarCellsClick(oCell, oInstance) {
        var sDay, sMonth, sYear, newDate
        sYear = oInstance.currDate.getFullYear();
        sMonth = oInstance.currDate.getMonth();
        sDay = oInstance.currDate.getDate();
        if (oCell.innerText != " ") {
            sDay = parseInt(oCell.innerText);
            if (sDay != oInstance.currDate.getDate()) {
                newDate = new Date(sYear, sMonth, sDay);
                oInstance.Refresh(newDate);
            }
        }
        sDateString = sYear + oInstance.separator + CalendarDblNum(sMonth + 1) + oInstance.separator + CalendarDblNum(sDay);		///return sDateString
        if (oInstance.oTaget.tagName == "INPUT") {
            oInstance.oTaget.value = sDateString;
        }
        document.all[oInstance.sDIVID].style.display = "none";
    }
    function CalendarYearChange(oInstance)				/// Year Change
    {
        var sDay, sMonth, sYear, newDate
        sDay = oInstance.currDate.getDate();
        sMonth = oInstance.currDate.getMonth();
        sYear = document.all[oInstance.sYEARID].value
        newDate = new Date(sYear, sMonth, sDay);
        oInstance.Refresh(newDate);
    }
    function CalendarMonthChange(oInstance)				/// Month Change
    {
        var sDay, sMonth, sYear, newDate
        sDay = oInstance.currDate.getDate();
        sMonth = document.all[oInstance.sMONTHID].value
        sYear = oInstance.currDate.getYear();
        newDate = new Date(sYear, sMonth, sDay);
        oInstance.Refresh(newDate);
    }
    function CalendarTodayClick(oInstance)				/// "Today" button Change
    {
        oInstance.Refresh(new Date());
    }
    function getDateString(oInputSrc, oInstance) {
        if (oInputSrc && oInstance) {
                          CalendarDiv = document.all[oInstance.sDIVID];
                          oInstance.oTaget = oInputSrc;
                          CalendarDiv.style.pixelLeft = CalendargetPos(oInputSrc, "Left");
                          CalendarDiv.style.pixelTop = CalendargetPos(oInputSrc, "Top") + oInputSrc.offsetHeight;
                          CalendarDiv.style.display = (CalendarDiv.style.display == "none") ? "" : "none";
                          }
                          }
                          function CalendarCellSetCss(sMode, oCell)			/// Set Cell Css
                          {
                          // sMode
                          // 0: OnMouserOut 1: OnMouseOver
                          if (sMode) {
                          oCell.style.border = "1px solid #5589AA";
                          oCell.style.backgroundColor = "#BCD0DE";
                          }
                          else {
                          oCell.style.border = "1px solid #FFFFFF";
                          oCell.style.backgroundColor = "#FFFFFF";
                          }
                          }
                          function CalendarGetMaxDay(nowYear, nowMonth)			/// Get MaxDay of current month
                          {
                          var nextMonth, nextYear, currDate, nextDate, theMaxDay
                          nextMonth = nowMonth + 1;
                          if (nextMonth > 11) {
                          nextYear = nowYear + 1;
                          nextMonth = 0;
                          }
                          else {
                          nextYear = nowYear;
                          }
                          currDate = new Date(nowYear, nowMonth, 1);
                          nextDate = new Date(nextYear, nextMonth, 1);
                          theMaxDay = (nextDate - currDate) / (24 * 60 * 60 * 1000);
                          return theMaxDay;
                          }
                          function CalendargetPos(el, ePro)				/// Get Absolute Position
                          {
                          var ePos = 0;
                          while (el != null) {
                          ePos += el["offset" + ePro];
                          el = el.offsetParent;
                          }
                          return ePos;
                          }
                          function CalendarDblNum(num) {
                          if (num < 10)
            return "0" + num;
        else
            return num;
    }
    function CalendarCancel(oInstance)			///Cancel
    {
        CalendarDiv = document.all[oInstance.sDIVID];
        CalendarDiv.style.display = "none";
    }
                        </script>



                        <script >
                          var oCalendarEn = new PopupCalendar("oCalendarEn");	//初始化控件时,请给出实例名称如:oCalendarEn
                          oCalendarEn.Init();
                          var oCalendarChs = new PopupCalendar("oCalendarChs");	//初始化控件时,请给出实例名称:oCalendarChs
                          oCalendarChs.weekDaySting = new Array("日", "一", "二", "三", "四", "五", "六");
                          oCalendarChs.monthSting = new Array("一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月");
                          oCalendarChs.oBtnTodayTitle = "今天";
                          oCalendarChs.oBtnCancelTitle = "取消";
                          oCalendarChs.Init();
                        </script>

                      </fieldset>
                    </form>
                  </div>
                </div>
                <div class="col-2">
                  <ul>
                    <li>
                      <img src="" />
                    </li>
                    <li>
                      <input id="Submit1" type="submit" value="upload" />
                    </li>

                    <li>
                      <strong>
                        <a href="#">Appoint History</a>
                      </strong>82.29.2013
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    <script type="text/javascript"> Cufon.now(); </script>
  </body>
</html>