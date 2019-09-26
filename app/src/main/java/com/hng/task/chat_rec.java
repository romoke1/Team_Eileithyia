package com.hng.task;

import android.view.View;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

public class chat_rec extends RecyclerView.ViewHolder  {



    TextView chatbotText,userText;

    public chat_rec(View itemView){
        super(itemView);

        chatbotText = (TextView)itemView.findViewById(R.id.chatbot_message);
        userText = (TextView)itemView.findViewById(R.id.chat_message);


    }
}
