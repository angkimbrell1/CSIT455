function myFunction() {
      var x = document.getElementById("updateEmployee");
      if (x.style.visibility === "hidden") {
          x.style.visibility = "visible";
          x.style.overflow = "visible";
          x.style.height = "auto";
          x.style.width = "auto";
      } else {
          x.style.visibility = "hidden";
          x.style.overflow = "hidden";
          x.style.height = "0px";
          x.style.width = "0px";
      }
    }
function addEmployeeForm() {
          var x = document.getElementById("addEmployee");
          if (x.style.visibility === "hidden") {
              x.style.visibility = "visible";
              x.style.overflow = "visible";
              x.style.height = "auto";
              x.style.width = "auto";
          } else {
              x.style.visibility = "hidden";
              x.style.overflow = "hidden";
              x.style.height = "0px";
              x.style.width = "0px";
          }
        }
function deleteEmployee() {
      var x = document.getElementById("deleteEmployee");
          if (x.style.visibility === "hidden") {
                x.style.visibility = "visible";
                x.style.overflow = "visible";
                x.style.height = "auto";
                x.style.width = "auto";
            } else {
                  x.style.visibility = "hidden";
                  x.style.overflow = "hidden";
                  x.style.height = "0px";
                  x.style.width = "0px";
                }
  }
