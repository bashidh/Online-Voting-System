<?php include "header.php"; 
if(!isset($_SESSION)) {
session_start();
}
?>
<html>
<head>
<title>FAQ's</title>
<link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
<style>
.FAQ__accordian {
  width: 100%;
}
.FAQ__title {
  width: 100%;
  display: flex;
  justify-content: space-between;
  padding: 15px 20px;
  font-size: 18px;
  background-color: #303030;
  border: 1px solid #303030;
  color: white;
}

.FAQ__visible {
  background-color: #303030;
  border-top: 1px solid white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.5s ease-in-out;
}

.FAQ__visible > p {
  margin: 1rem;
  color:white;
}
.FAQ__list__container {
  padding: 2rem 0;
}
.FAQ__heading {
  font-size: 20px;
  text-align: center;
  font-weight: 600;
  margin: 1rem 3rem;
}

.FAQ__list {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 10px;
  padding: 1rem 25rem;
}
</style>

</head>
<body>
<main>
    <section class="FAQ__list__container">
        <h1 class="FAQ__heading">Frequently Asked Questions</h1>
        <div class="FAQ__list">
          <div class="FAQ__accordian">
            <button class="FAQ__title">
              Why e-voting?<i class="fal fa-plus"></i>
            </button>
            <div class="FAQ__visible">
              <p>
                The purpose of the e-voting system is to make people vote in 
				user-friendly and fullest manner by residing at their own place. 
				Using this kind of E-voting system has the intention to increase
				the voting percentage of India.
              </p>
            </div>
          </div>
          <div class="FAQ__accordian">
            <button class="FAQ__title">
              Why the OTP is not received?<i class="fal fa-plus"></i>
            </button>
            <div class="FAQ__visible">
              <p>
                Due to high traffic our server may slow, please try again later.
              </p>
            </div>
          </div>
          <div class="FAQ__accordian">
            <button class="FAQ__title">
              Is aadhar id is mandatory?<i class="fal fa-plus"></i>
            </button>
            <div class="FAQ__visible">
              <p>
                Everyone must enter the aadhar number to cast your vote.
				It is the only unique id for casting your vote.
              </p>
            </div>
          </div>
		  <div class="FAQ__accordian">
            <button class="FAQ__title">
              Is mobile number is mandatory?<i class="fal fa-plus"></i>
            </button>
            <div class="FAQ__visible">
              <p>
                Everyone must enter the valid mobile number to receive the OTP.
				Then only you will be returned to vote casting page. 
              </p>
            </div>
          </div>
        </div>
    </section>
</main>

<script type="text/javascript" > 
let accordian = document.getElementsByClassName("FAQ__title");

for (let i = 0; i < accordian.length; i++) {
  accordian[i].addEventListener("click", function () {
    if (this.childNodes[1].classList.contains("fa-plus")) {
      this.childNodes[1].classList.remove("fa-plus");
      this.childNodes[1].classList.add("fa-times");
    } else {
      this.childNodes[1].classList.remove("fa-times");
      this.childNodes[1].classList.add("fa-plus");
    }

    let content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}
</script>

</body>

<?php include "footer.php"; ?>