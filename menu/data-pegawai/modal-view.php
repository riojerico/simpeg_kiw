<!-- ============================================================== AWAL KONTEN =================================================================== -->                  
                <!-- Dialog Modal View -->
                  <div class="modal fade" id="myModalView<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $data['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel<?php echo $data['id']; ?>">Data Pegawai</h4>
                        </div>

                        <div class="modal-body">
                          
                          <div class="row" style="min-height:600px;">
                            <div  class="col-sm-9">
                              <div class="col-xs-6"> <!-- required for floating -->
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                  <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                                  <li><a href="#profile" data-toggle="tab">Profile</a></li>
                                  <li><a href="#messages" data-toggle="tab">Messages</a></li>
                                  <li><a href="#settings" data-toggle="tab">Settings</a></li>
                                </ul>
                              </div>

                              <div class="col-xs-6">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                  <div class="tab-pane active" id="home">Home Tab.
                                  </div>
                                  <div class="tab-pane" id="profile">Profile Tab.</div>
                                  <div class="tab-pane" id="messages">Messages Tab.</div>
                                  <div class="tab-pane" id="settings">Settings Tab.</div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-3">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                  <h1>Foto dan data keluarga</h1>
                                </div>
                            </div>  
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>  

                        </div>
                      </div>
                    </div>
                   
<!-- ============================================================== AKHIR KONTEN =================================================================== -->
