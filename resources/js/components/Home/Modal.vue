<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="staticBackdrop"
    data-backdrop="static"
    data-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
      >
        <span aria-hidden="true"></span>
      </button>
    </div>

    <div
      class="modal-body d-flex justify-content-center align-items-center mt-5"
    >
      <div class="container box">
        <div class="topic text-center d-flex justify-content-around">
          Cerca il ristorante che preferisci!
          <button type="button" class="btn" data-dismiss="modal">Chiudi</button>
        </div>

        <div class="content">
          <input type="radio" name="slider" checked id="tutti" />
          <input type="radio" name="slider" id="Francese" />
          <input type="radio" name="slider" id="Italiano" />
          <input type="radio" name="slider" id="Giapponese" />
          <input type="radio" name="slider" id="Marocchino" />
          <input type="radio" name="slider" id="Messicano" />
          <input type="radio" name="slider" id="Turco" />

          <div class="list">
            <label for="tutti" class="tutti">
              <span class="title">Tutti</span>
            </label>
            <label for="Francese" class="Francese">
              <span class="title">Francese</span>
            </label>
            <label for="Italiano" class="Italiano">
              <span class="title">Italiano</span>
            </label>
            <label for="Giapponese" class="Giapponese">
              <span class="title">Giapponese</span>
            </label>
            <label for="Marocchino" class="Marocchino">
              <span class="title">Marocchino</span>
            </label>
            <label for="Messicano" class="Messicano">
              <span class="title">Messicano</span>
            </label>
            <label for="Turco" class="Turco">
              <span class="title">Turco</span>
            </label>

            <div class="slider"></div>
          </div>
          <div class="text-content">
            <!-- tutti -->
            <div class="col-11 d-flex justify-content-around flex-wrap">
              <div class="tutti text">
                <div class="card m-2">
                  <div class="cover">
                    <h5>Ristorante Tal dei Tali</h5>
                  </div>
                  <div class="details">
                    <div>
                      <!-- <img src="./img/cake.png" alt="" /> -->
                      <h3>Ristorante Tal dei Tali</h3>
                      <a href="http://127.0.0.1:8000/restaurants/5"
                        >Vai al menù</a
                      >
                    </div>
                  </div>
                </div>
              </div>
              <div class="tutti text">
                <div class="card m-2">
                  <div class="cover">
                    <h5>Ristorante Tal dei Tali</h5>
                  </div>
                  <div class="details">
                    <div>
                      <!-- <img src="./img/cake.png" alt="" /> -->
                      <h3>Ristorante Tal dei Tali</h3>
                      <a href="http://127.0.0.1:8000/restaurants/4"
                        >Vai al menù</a
                      >
                    </div>
                  </div>
                </div>
              </div>
              <div class="tutti text">
                <div class="card">
                  <div class="cover m-2">
                    <h5>Ristorante Tal dei Tali</h5>
                  </div>
                  <div class="details">
                    <div>
                      <!-- <img src="./img/cake.png" alt="" /> -->
                      <h3>Ristorante Tal dei Tali</h3>
                      <a href="./menu">Vai al menù</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tutti text">
                <div class="card">
                  <div class="cover m-2">
                    <h5>Ristorante Tal dei Tali</h5>
                  </div>
                  <div class="details">
                    <div>
                      <!-- <img src="./img/cake.png" alt="" /> -->
                      <h3>Ristorante Tal dei Tali</h3>
                      <a href="./menu">Vai al menù</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Francese -->
            <div class="col-11 d-flex justify-content-around flex-wrap">
              <div class="Francese text">
                <div class="Francese text">
                  <div class="card">
                    <div class="cover m-2">
                      <h5>Ristorante Tal dei Tali</h5>
                    </div>
                    <div class="details">
                      <div>
                        <!-- <img src="./img/cake.png" alt="" /> -->
                        <h3>Ristorante Tal dei Tali</h3>
                        <a href="./menu">Vai al menù</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Italiano -->
            <div class="col-11 d-flex justify-content-around flex-wrap">
              <div class="Italiano text">
                <div class="Italiano text">
                  <div class="card">
                    <div class="cover m-2">
                      <h5>Ristorante Tal dei Tali</h5>
                    </div>
                    <div class="details">
                      <div>
                        <!-- <img src="./img/cake.png" alt="" /> -->
                        <h3>Ristorante Tal dei Tali</h3>
                        <a href="./menu">Vai al menù</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Giapponese -->
            <div class="d-flex justify-content-around">
              <div class="Giapponese text">
                <div class="card">
                  <div class="cover">
                    <h5>Ristorante Tal dei Tali</h5>
                  </div>
                  <div class="details">
                    <div>
                      <!-- <img src="./img/cake.png" alt="" /> -->
                      <h3>Ristorante Tal dei Tali</h3>
                      <a href="./menu">Vai al menù</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="Giapponese text">
                <div class="card">
                  <div class="cover">
                    <h5>Ristorante Tal dei Tali</h5>
                  </div>
                  <div class="details">
                    <div>
                      <!-- <img src="./img/cake.png" alt="" /> -->
                      <h3>Ristorante Tal dei Tali</h3>
                      <a href="./menu">Vai al menù</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Marocchino -->
            <div class="col-11 d-flex justify-content-around flex-wrap">
              <div class="Marocchino text">
                <div class="Marocchino text">
                  <div class="card">
                    <div class="cover m-2">
                      <h5>Ristorante Tal dei Tali</h5>
                    </div>
                    <div class="details">
                      <div>
                        <!-- <img src="./img/cake.png" alt="" /> -->
                        <h3>Ristorante Tal dei Tali</h3>
                        <a href="./menu">Vai al menù</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Messicano -->
            <div class="d-flex justify-content-around">
              <div class="Messicano text">
                <div class="card">
                  <div class="cover">
                    <h5>Ristorante Tal dei Tali</h5>
                  </div>
                  <div class="details">
                    <div>
                      <!-- <img src="./img/cake.png" alt="" /> -->
                      <h3>Ristorante Tal dei Tali</h3>
                      <a href="./menu">Vai al menù</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="Messicano text">
                <div class="card">
                  <div class="cover">
                    <h5>Ristorante Tal dei Tali</h5>
                  </div>
                  <div class="details">
                    <div>
                      <!-- <img src="./img/cake.png" alt="" /> -->
                      <h3>Ristorante Tal dei Tali</h3>
                      <a href="./menu">Vai al menù</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Turco -->
            <div class="col-11 d-flex justify-content-around flex-wrap">
              <div class="Turco text">
                <div class="Turco text">
                  <div class="card">
                    <div class="cover m-2">
                      <h5>Ristorante Tal dei Tali</h5>
                    </div>
                    <div class="details">
                      <div>
                        <!-- <img src="./img/cake.png" alt="" /> -->
                        <h3>Ristorante Tal dei Tali</h3>
                        <a href="./menu">Vai al menù</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Modal",
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

/* format */

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

// MODAL
.box {
  max-width: 950px;
  width: 100%;
  padding: 40px 50px 40px 40px;
  background: #fff;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
.box .topic {
  font-size: 30px;
  font-weight: 500;
  margin-bottom: 20px;
}
.content {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.content .list {
  display: flex;
  flex-direction: column;
  width: 20%;
  margin-right: 50px;
  position: relative;
}
.content .list label {
  height: 60px;
  font-size: 22px;
  font-weight: 500;
  line-height: 60px;
  cursor: pointer;
  padding-left: 25px;
  transition: all 0.5s ease;
  color: #333;
  z-index: 12;
}
#tutti:checked ~ .list label.tutti,
#Francese:checked ~ .list label.Francese,
#Italiano:checked ~ .list label.Italiano,
#Giapponese:checked ~ .list label.Giapponese,
#Messicano:checked ~ .list label.Messicano,
#Turco:checked ~ .list label.Turco,
#Marocchino:checked ~ .list label.Marocchino {
  color: #fff;
}
.content .list label:hover {
  color: #ff5858;
}
.content .slider {
  position: absolute;
  left: 0;
  top: 0;
  height: 60px;
  width: 100%;
  border-radius: 12px;
  background: #ff5858;
  transition: all 0.4s ease;
}
#tutti:checked ~ .list .slider {
  top: 0;
}
#Francese:checked ~ .list .slider {
  top: 60px;
}
#Italiano:checked ~ .list .slider {
  top: 120px;
}
#Giapponese:checked ~ .list .slider {
  top: 180px;
}
#Marocchino:checked ~ .list .slider {
  top: 240px;
}
#Messicano:checked ~ .list .slider {
  top: 300px;
}
#Turco:checked ~ .list .slider {
  top: 360px;
}
.content .text-content {
  width: 80%;
  height: 100%;
}
.content .text {
  display: none;
}
.content .text .title {
  font-size: 25px;
  margin-bottom: 10px;
  font-weight: 500;
}
.content .text p {
  text-align: justify;
}
.content .text-content .tutti {
  display: block;
}
#tutti:checked ~ .text-content .tutti,
#Francese:checked ~ .text-content .Francese,
#Italiano:checked ~ .text-content .Italiano,
#Giapponese:checked ~ .text-content .Giapponese,
#Marocchino:checked ~ .text-content .Marocchino,
#Messicano:checked ~ .text-content .Messicano,
#Turco:checked ~ .text-content .Turco {
  display: block;
}
#Francese:checked ~ .text-content .tutti,
#Italiano:checked ~ .text-content .tutti,
#Giapponese:checked ~ .text-content .tutti,
#Marocchino:checked ~ .text-content .tutti,
#Messicano:checked ~ .text-content .tutti,
#Turco:checked ~ .text-content .tutti {
  display: none;
}
.content input {
  display: none;
}

/* CARD */
.card {
  position: relative;
  width: 200px;
  height: 200px;
  background-color: rgb(255, 255, 255);
  transform-style: preserve-3d;
  transform: perspective (2000px);
  transition: 1s;
  box-shadow: inset 300px 0 20px rgba(0, 0, 0, 0.15),
    0 20px 20px rgba(0, 0, 0, 0.15);
}

.card:hover {
  transform: perspective (2000px) translate(50%);
  box-shadow: inset 20px 0 50px rgba(0, 0, 0, 0.15),
    0 10px 10px rgba(0, 0, 0, 0.15);
}

.card .cover {
  position: relative;
  width: 100%;
  height: 100%;
  background-color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  transform-style: preserve-3d;
  overflow: hidden;
  z-index: 2;
  transition: 0.8s ease-in-out;
  transform-origin: left;
}

.card:hover .cover {
  transform: rotateY(-100deg);
}

.card .cover h5 {
  background-color: rgb(255, 255, 255);
  max-width: 100%;
  z-index: 1;
  padding: 10px;
}

.card .cover::before {
  content: "";
  position: absolute;
  width: 10px;
  height: 150%;
  background: white;
  transform: rotate(120deg);
  box-shadow: 0 0 0 20px #ff5858;
  transition: 0.5s;
  transition-delay: 1s;
}

.card:hover .cover h5 {
  opacity: 0;
  transition: 1s;
}

.card:hover .cover::before {
  width: 0;
  box-shadow: 0 0 0 250px #ff5858;
  transform: rotate(120deg);
}

.card .details {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background-color: rgb(255, 255, 255);
  transform-style: preserve-3d;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  text-align: center;
  z-index: 1;
}

.card .details h3 {
  font-weight: 500;
  margin: 5px 0;
}

.card .details h2 {
  font-weight: 600;
  font-size: 1.5rem;
  color: rgb(42, 95, 165);
}

.card .details a {
  display: inline-block;
  padding: 8px 20px;
  background: rgb(42, 95, 165);
  color: white;
  margin-top: 5px;
  letter-spacing: 1px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: 500;
  text-decoration: none;
}

img {
  width: 200px;
}
</style>