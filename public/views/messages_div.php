<div id="message-div" class="message">
                    <?php
                        if(isset($messages)){
                            foreach ($messages as $message){
                                if(isset($flag)){
                                    echo '<span class="message-text error">' . $message . '</span>';
                                } else{
                                    echo '<span class="message-text">' . $message . '</span>';
                                }
                            }
                        }
                    ?>
</div>