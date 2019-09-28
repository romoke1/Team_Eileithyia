package com.hng.task;

import android.content.Context;
import android.graphics.Color;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;
import com.hng.task.models.ChatMessage;
import java.util.List;

public class ChatRecyclerViewAdapter extends RecyclerView.Adapter<ChatRecyclerViewAdapter.ViewHolder>{

    private final Context mContext;
    private final List<ChatMessage> mChatMessages;
    private final LayoutInflater mLayoutInflater;

    public ChatRecyclerViewAdapter(Context context, List<ChatMessage> chatMessages) {
        this.mContext = context;
        this.mChatMessages = chatMessages;
        this.mLayoutInflater = LayoutInflater.from(context);
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View itemView = mLayoutInflater.inflate(R.layout.message_list, parent, false);
        return new ViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        ChatMessage mChatMessage = mChatMessages.get(position);

        if(mChatMessage.getSender().equalsIgnoreCase("user")){
            holder.chatMessage.setText(mChatMessage.getMessage());
            holder.chatMessage.setVisibility(View.VISIBLE);
            holder.botMessage.setVisibility(View.GONE);
        } else if(mChatMessage.getSender().equalsIgnoreCase("chatBot")){
            holder.botMessage.setText(mChatMessage.getMessage());
            holder.botMessage.setVisibility(View.VISIBLE);
            holder.chatMessage.setVisibility(View.GONE);
        }
    }

    @Override
    public int getItemCount() {
        return mChatMessages.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {

        public final TextView chatMessage;
        public final TextView botMessage;

        public ViewHolder(View itemView) {
            super(itemView);

            botMessage = itemView.findViewById(R.id.chatbot_message);
            chatMessage = itemView.findViewById(R.id.chat_message);

        }

    }
}
