<style>
.mainRight{
    width: 80%;
    position: absolute;
    right: 0;
    top:50px;
}
.header{
    width: 80%;
    position:fixed;
    z-index: 100;
    right:0;
  }
  .header #settinglist{
    position:absolute;
    right:50px;
    display:none;
    list-style: none;
  }
  .header #settinglist.show{
    display:block !important;
  }
@media (max-width: 1199px) {
    .header{
      width: 100%;
    }
    .mainRight{
    width: 100%;
}
  }
  </style>