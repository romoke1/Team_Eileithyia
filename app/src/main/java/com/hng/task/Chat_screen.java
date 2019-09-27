package com.hng.task;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.core.view.GravityCompat;
import androidx.drawerlayout.widget.DrawerLayout;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.method.ScrollingMovementMethod;
import android.util.Log;
import android.view.Gravity;
import android.view.MenuItem;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.firebase.ui.database.FirebaseRecyclerAdapter;
import com.google.android.material.navigation.NavigationView;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.hng.task.models.ChatMessage;

import java.util.ArrayList;
import java.util.List;

import ai.api.AIDataService;
import ai.api.AIListener;
import ai.api.AIServiceException;
import ai.api.android.AIConfiguration;
import ai.api.android.AIService;
import ai.api.model.AIError;
import ai.api.model.AIRequest;
import ai.api.model.AIResponse;
import ai.api.model.Result;

public class Chat_screen extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener, AIListener {

    private static final String TAG = "Chat Screen";

    //firebase variables
    private FirebaseAuth mAuth;

    //widgets
    private DrawerLayout mDrawerLayout;
    private ImageView mBack;
    private EditText txtMessage;
    private ImageView sendMessage;

    //utilities
    private ChatRecyclerViewAdapter mChatRecyclerViewAdapter;
    private RecyclerView mRecyclerView;
    private LinearLayoutManager mLinearLayoutManager;
    private List<ChatMessage> mChatMessages;


    DatabaseReference ref;
    FirebaseRecyclerAdapter<ChatMessage,chat_rec> adapter;
    private AIService aiService;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chat_screen);

        //init firebase
        mAuth = FirebaseAuth.getInstance();

        //widgets
        txtMessage = findViewById(R.id.txt_message);
        txtMessage.setMovementMethod(new ScrollingMovementMethod());
        sendMessage = findViewById(R.id.send_message);

        //NavigationView Widgets
        NavigationView navigationView = findViewById(R.id.navigation_view);
        View headerView = navigationView.getHeaderView(0);
        mBack = headerView.findViewById(R.id.hide_sidebar);
        mDrawerLayout = findViewById(R.id.drawer_layout);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, mDrawerLayout, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        mDrawerLayout.addDrawerListener(toggle);
        toggle.syncState();


        //utilities
        mChatMessages = new ArrayList<>();
        mRecyclerView = findViewById(R.id.chat_list);
        mLinearLayoutManager = new LinearLayoutManager(this);


        //attach utilities
        mRecyclerView.setHasFixedSize(true);
        mRecyclerView.setLayoutManager(mLinearLayoutManager);
        ref = FirebaseDatabase.getInstance().getReference();
        ref.keepSynced(true);

        //CHAT BOT LOGIC INITIALIZER
        final AIConfiguration config = new AIConfiguration("6f109cdda871424f85dbb5398f6f6586",
                AIConfiguration.SupportedLanguages.English,
                AIConfiguration.RecognitionEngine.System);

        aiService = AIService.getService(this, config);
        aiService.setListener(this);

        final AIDataService aiDataService = new AIDataService(config);

        final AIRequest aiRequest = new AIRequest();


//        mChatRecyclerViewAdapter = new ChatRecyclerViewAdapter(this, mChatMessages);
        mRecyclerView.setAdapter(mChatRecyclerViewAdapter);

        //listeners
        setNavigationViewListener();

        mBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                mDrawerLayout.closeDrawer(Gravity.LEFT);
            }
        });

        sendMessage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String message = txtMessage.getText().toString();
                /*ChatMessage botMessage = new ChatMessage(message, "chatBot");
                mChatMessages.add(userMessage);
                mChatMessages.add(botMessage);
                txtMessage.setText("");
                mChatRecyclerViewAdapter.notifyDataSetChanged();*/

                if (!message.equals("")) {
                    ChatMessage userMessage = new ChatMessage(message, "user");
                    mChatMessages.add(userMessage);
                    ref.child("chat").child(mAuth.getCurrentUser().getUid()).push().setValue(userMessage);

                    aiRequest.setQuery(message);
                    new AsyncTask<AIRequest,Void,AIResponse>(){

                        @Override
                        protected AIResponse doInBackground(AIRequest... aiRequests) {
                            final AIRequest request = aiRequests[0];
                            try {
                                final AIResponse response = aiDataService.request(aiRequest);
                                return response;
                            } catch (AIServiceException e) {
                            }
                            return null;
                        }
                        @Override
                        protected void onPostExecute(AIResponse response) {
                            if (response != null) {

                                Result result = response.getResult();
                                String reply = result.getFulfillment().getSpeech();
                                ChatMessage botMessage = new ChatMessage(reply, "chatbot");
                                mChatMessages.add(botMessage);
                                ref.child("chat").child(mAuth.getCurrentUser().getUid()).push().setValue(botMessage);
                            }
                        }
                    }.execute(aiRequest);
                }
                else {
                    aiService.startListening();
                }
                int newMsgPosition = mChatMessages.size() - 1;
                /*adapter.notifyDataSetChanged();
                mRecyclerView.scrollToPosition(getWindow().getAttributes().height);*/
                txtMessage.setText("");
                try  {
                    InputMethodManager imm = (InputMethodManager)getSystemService(INPUT_METHOD_SERVICE);
                    imm.hideSoftInputFromWindow(getCurrentFocus().getWindowToken(), 0);
                } catch (Exception e) {

                }

            }
        });

        adapter = new FirebaseRecyclerAdapter<ChatMessage, chat_rec>(ChatMessage.class,R.layout.message_list,chat_rec.class,ref.child("chat").child(mAuth.getCurrentUser().getUid())) {
            @Override
            protected void populateViewHolder(chat_rec viewHolder, ChatMessage model, int position) {

                if (model.getSender().equals("user")) {


                    viewHolder.userText.setText(model.getMessage());

                    viewHolder.userText.setVisibility(View.VISIBLE);
                    viewHolder.chatbotText.setVisibility(View.GONE);
                }
                else {
                    viewHolder.chatbotText.setText(model.getMessage());

                    viewHolder.userText.setVisibility(View.GONE);
                    viewHolder.chatbotText.setVisibility(View.VISIBLE);
                }
            }
        };

        adapter.registerAdapterDataObserver(new RecyclerView.AdapterDataObserver() {
            @Override
            public void onItemRangeInserted(int positionStart, int itemCount) {
                super.onItemRangeInserted(positionStart, itemCount);

                int msgCount = adapter.getItemCount();
                int lastVisiblePosition = mLinearLayoutManager.findLastCompletelyVisibleItemPosition();

                if (lastVisiblePosition == -1 ||
                        (positionStart >= (msgCount - 1) &&
                                lastVisiblePosition == (positionStart - 1))) {
                    mRecyclerView.scrollToPosition(positionStart);

                }

            }
        });


        mRecyclerView.setAdapter(adapter);

    }

    private void chatbotAI(){

    }

    private void setNavigationViewListener() {
        Log.d(TAG, "setNavigationViewListener: initializing navigation drawer listener");
        NavigationView navigationView = findViewById(R.id.navigation_view);
        navigationView.setNavigationItemSelectedListener(this);
    }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
        switch (menuItem.getItemId()) {

            case R.id.my_profile:
                Intent intent = new Intent(Chat_screen.this, Profile.class);
                startActivity(intent);
                return true;
            case R.id.log_out:
                if(mAuth.getCurrentUser() != null){
                    mAuth.signOut();
                    Intent mine = new Intent(Chat_screen.this, Sign_in.class);
                    Toast.makeText(Chat_screen.this, "Signed out", Toast.LENGTH_LONG).show();
                    startActivity(mine);
                    finish();
                }
                return true;
        }

        mDrawerLayout.closeDrawer(GravityCompat.START);
        return false;
    }

    @Override
    public void onResult(AIResponse result) {
        Result responseResult = result.getResult();

        String message = responseResult.getResolvedQuery();
        ChatMessage chatMessage0 = new ChatMessage(message, "user");
        ref.child("chat").child(mAuth.getCurrentUser().getUid()).push().setValue(chatMessage0);


        String reply = responseResult.getFulfillment().getSpeech();
        ChatMessage chatMessage = new ChatMessage(reply, "bot");
        ref.child("chat").child(mAuth.getCurrentUser().getUid()).push().setValue(chatMessage);
    }

    @Override
    public void onError(AIError error) {

    }

    @Override
    public void onAudioLevel(float level) {

    }

    @Override
    public void onListeningStarted() {

    }

    @Override
    public void onListeningCanceled() {

    }

    @Override
    public void onListeningFinished() {

    }
}
