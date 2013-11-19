// BMI - JavaScript Document

                function addNumbers()
                {
                        var wei=document.getElementById("weight");
                        var hei=document.getElementById("height");
                        var heivalue=document.getElementById("height").value;
                        var weivalue=document.getElementById("weight").value;
                        var val1 = document.getElementById("value1").value;
                        var val2 = document.getElementById("value2").value;
                        var ansD = document.getElementById("answer");
                        var bmi;
                        if (heivalue=="Cm" && weivalue=="Kg") {bmi = (10000*val2/val1/val1); ansD.value = bmi.toFixed(1);}
                        if (heivalue=="Inch" && weivalue=="Lb") {bmi = (703*val2/val1/val1); ansD.value = bmi.toFixed(1);};
                        
                }
               function classification()
                {
                       var pop = document.getElementById("pop").value;
                       var ansD = document.getElementById("answer");
                       var cate = document.getElementById("Cate");
                       var obclass = document.getElementById("obclass");
                       if (pop=="US/European"&&ansD.value < 16.0) {cate.value = "Severely underweight";obclass.value = "N/A"}
                       if (pop=="US/European"&&ansD.value>=16.0&&ansD.value<18.5) {cate.value = "Underweight";obclass.value = "N/A"}
                       if (pop=="US/European"&&ansD.value>=18.5&&ansD.value<25.0) {cate.value = "Normal";obclass.value = "N/A"}
                       if (pop=="US/European"&&ansD.value>=25.0&&ansD.value<30.0) {cate.value = "Overweight";obclass.value = "N/A"}
                       if (pop=="US/European"&&ansD.value>=30.0&&ansD.value<35.0) {cate.value = "Obese";obclass.value = "I"}
                       if (pop=="US/European"&&ansD.value>=35.0&&ansD.value<40.0) {cate.value = "Obese";obclass.value = "II"}
                       if (pop=="US/European"&&ansD.value>40.0) {cate.value = "Extremely obese";obclass.value = "III"}
                       if (pop=="Asian"&&ansD.value>=18.5&&ansD.value<22.9) {cate.value = "Normal";obclass.value = "N/A"}
                       if (pop=="Asian"&&ansD.value>=23.0&&ansD.value<24.9) {cate.value = "Overweight";obclass.value = "N/A"}
                       if (pop=="Asian"&&ansD.value>25.0) {cate.value = "Obese";obclass.value = "N/A"}
                       
                       
                       
                 } 
function classification2()
                  {   
                       var cate = document.getElementById("Cate");
                       var sex = document.getElementById("sex");
                       var wai = document.getElementById("waist");
                       var unit = document.getElementById("unit");
                       var ansD = document.getElementById("answer");
                       var dis = document.getElementById("answer2");
                       if (sex.value == "men"||"women"&&cate.value =="Severely underweight"||"Underweight"||"Normal") {dis.value = "N/A"}
               if (sex.value == "men"&&cate.value =="Overweight"&&unit.value=="in"&&wai.value<=40) {dis.value = "Increased"}
                       if (sex.value == "men"&&cate.value =="Overweight"&&unit.value=="cm"&&wai.value<=102) {dis.value = "Increased"}
               if (sex.value == "men"&&cate.value =="Overweight"&&unit.value=="in"&&wai.value>40) {dis.value = "High"}
                       if (sex.value == "men"&&cate.value =="Overweight"&&unit.value=="cm"&&wai.value>102) {dis.value = "High"}
                       if (sex.value == "men"&&ansD.value>=30.0&&ansD.value<35.0&&unit.value=="in"&&wai.value<=40) {dis.value = "High"}
                       if (sex.value == "men"&&ansD.value>=30.0&&ansD.value<35.0&&unit.value=="cm"&&wai.value<=102) {dis.value = "High"}
                       if (sex.value == "men"&&ansD.value>=30.0&&ansD.value<35.0&&unit.value=="in"&&wai.value>40) {dis.value = "Very High"}
                       if (sex.value == "men"&&ansD.value>=30.0&&ansD.value<35.0&&unit.value=="cm"&&wai.value>102) {dis.value = "Very High"}
                       if (sex.value == "men"&&ansD.value>=35.0&&ansD.value<40.0&&unit.value=="in"&&wai.value<=40) {dis.value = "Very High"}
                       if (sex.value == "men"&&ansD.value>=35.0&&ansD.value<40.0&&unit.value=="cm"&&wai.value<=102) {dis.value = "Very High"}
                       if (sex.value == "men"&&ansD.value>=35.0&&ansD.value<40.0&&unit.value=="in"&&wai.value>40) {dis.value = "Very High"}
                       if (sex.value == "men"&&ansD.value>=35.0&&ansD.value<40.0&&unit.value=="cm"&&wai.value>102) {dis.value = "Very High"}
               if (sex.value == "men"&&cate.value =="Extremely obese"&&unit.value=="in"&&wai.value<=40) {dis.value = "Extremely High"}
                       if (sex.value == "men"&&cate.value =="Extremely obese"&&unit.value=="cm"&&wai.value<=102) {dis.value = "Extremely High"}
               if (sex.value == "men"&&cate.value =="Extremely obese"&&unit.value=="in"&&wai.value>40) {dis.value = "Extremely High"}
                       if (sex.value == "men"&&cate.value =="Extremely obese"&&unit.value=="cm"&&wai.value>102) {dis.value = "Extremely High"}
                       if (sex.value == "women"&&cate.value =="Overweight"&&unit.value=="in"&&wai.value<=35) {dis.value = "Increased"}
                       if (sex.value == "women"&&cate.value =="Overweight"&&unit.value=="cm"&&wai.value<=88) {dis.value = "Increased"}
               if (sex.value == "women"&&cate.value =="Overweight"&&unit.value=="in"&&wai.value>35) {dis.value = "High"}
                       if (sex.value == "women"&&cate.value =="Overweight"&&unit.value=="cm"&&wai.value>88) {dis.value = "High"}
                       if (sex.value == "women"&&ansD.value>=30.0&&ansD.value<35.0&&unit.value=="in"&&wai.value<=35) {dis.value = "High"}
                       if (sex.value == "women"&&ansD.value>=30.0&&ansD.value<35.0&&unit.value=="cm"&&wai.value<=88) {dis.value = "High"}
                       if (sex.value == "women"&&ansD.value>=30.0&&ansD.value<35.0&&unit.value=="in"&&wai.value>35) {dis.value = "Very High"}
                       if (sex.value == "women"&&ansD.value>=30.0&&ansD.value<35.0&&unit.value=="cm"&&wai.value>88) {dis.value = "Very High"}
                       if (sex.value == "women"&&ansD.value>=35.0&&ansD.value<40.0&&unit.value=="in"&&wai.value<=35) {dis.value = "Very High"}
                       if (sex.value == "women"&&ansD.value>=35.0&&ansD.value<40.0&&unit.value=="cm"&&wai.value<=88) {dis.value = "Very High"}
                       if (sex.value == "women"&&ansD.value>=35.0&&ansD.value<40.0&&unit.value=="in"&&wai.value>35) {dis.value = "Very High"}
                       if (sex.value == "women"&&ansD.value>=35.0&&ansD.value<40.0&&unit.value=="cm"&&wai.value>88) {dis.value = "Very High"}
               if (sex.value == "women"&&cate.value =="Extremely obese"&&unit.value=="in"&&wai.value<=35) {dis.value = "Extremely High"}                                   if (sex.value == "women"&&cate.value =="Extremely obese"&&unit.value=="cm"&&wai.value<=88) {dis.value = "Extremely High"}                                   if (sex.value == "women"&&cate.value =="Extremely obese"&&unit.value=="in"&&wai.value>35) {dis.value = "Extremely High"}
                       if (sex.value == "women"&&cate.value =="Extremely obese"&&unit.value=="cm"&&wai.value>88) {dis.value = "Extremely High"};
}
