<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Message Thread</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Message Thread</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <!-- Direct Chat -->
      <h4 class="mt-4 mb-2">Direct Chat</h4>
      <div class="row">
        <div class="col-lg-12">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="card card-primary card-outline direct-chat direct-chat-primary">
            <div class="card-header">
              <h3 class="card-title">Direct Chat</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages" id="messageThread">
                <!-- Message threads will be loaded dynamically here -->
              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <!-- You can add contacts here if needed -->
                </ul>
                <!-- /.contatcts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <form id="sendMessageForm" action="#" method="post">
                <div class="input-group">
                  <input type="text" id="messageInput" name="message" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-append">
                    <button type="submit" id="sendMessageButton" class="btn btn-primary">Send</button>
                  </span>
                </div>
              </form>
            </div>
            <!-- /.card-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
        <!-- /.col -->
      </div>


    </section>
    <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->
</div>