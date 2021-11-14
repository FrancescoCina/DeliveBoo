<template>
  <div class="box-footerIn">
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex">
        <link
          rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <div class="center">
          <div id="social-test">
            <ul class="social">
              <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
              <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
              <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
              <li><i class="fa fa-vimeo" aria-hidden="true"></i></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Footer",
};
</script>

<style scoped lang="scss">
.box-footerSu {
  background-color: #ff5858;
  color: white;
  padding: 30px;
  height: 150px;
  list-style-type: none;
  li {
    margin-top: 30px;
  }
  a {
    text-decoration: none;
    font-size: 15px;
    color: #ffffff;
    transition: 0.3s;
    margin-bottom: 10px;
    padding: 20px 10px 0px 10px;
  }

  a:hover {
    color: white;
  }
}
.box-footerIn {
  list-style-type: none;

  #social-test {
    display: table-cell;
    text-align: center;
    font-size: 15px;

    li {
      color: #ffffff;
      list-style-type: none;
      display: inline-block;
      width: 35px;
      height: 35px;
      padding: 8px;

      background-color: #ff5858;
      cursor: pointer;
      margin-left: 10px;

      transition: ease 0.3s;
      &:hover {
        color: white;
      }
    }
  }
  .social:hover > li {
    opacity: 0.5;
  }

  .social:hover > li:hover {
    opacity: 1;
  }
}
</style>