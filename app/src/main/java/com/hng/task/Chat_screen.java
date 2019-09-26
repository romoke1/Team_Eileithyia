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
import android.os.Bundle;
import android.text.method.ScrollingMovementMethod;
import android.util.Log;
import android.view.Gravity;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.google.android.material.navigation.NavigationView;
import com.google.firebase.auth.FirebaseAuth;
import com.hng.task.models.ChatMessage;

import java.util.ArrayList;
import java.util.List;

public class Chat_screen extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener  {

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
        mRecyclerView.setLayoutManager(mLinearLayoutManager);
        mChatRecyclerViewAdapter = new ChatRecyclerViewAdapter(this, mChatMessages);
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
                ChatMessage userMessage = new ChatMessage(message, "user");
                ChatMessage botMessage = new ChatMessage(message, "chatBot");
                mChatMessages.add(userMessage);
                mChatMessages.add(botMessage);
                txtMessage.setText("");
                mChatRecyclerViewAdapter.notifyDataSetChanged();
            }
        });
    }

    private void setNavigationViewListener() {
        Log.d(TAG, "setNavigationViewListener: initializing navigation drawer listener");
        NavigationView navigationView = findViewById(R.id.navigation_view);
        navigationView.setNavigationItemSelectedListener(this);
    }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
        switch (menuItem.getItemId()) {

            case R.id.my_profile: {
                Intent intent = new Intent(Chat_screen.this, Profile.class);
                startActivity(intent);
            }

            case R.id.log_out: {
                if(mAuth.getCurrentUser() != null){
                    mAuth.signOut();
                    Intent intent = new Intent(Chat_screen.this, Sign_in.class);
                    Toast.makeText(Chat_screen.this, "Signed out", Toast.LENGTH_LONG).show();
                    startActivity(intent);
                    finish();
                }
            }

        }

        mDrawerLayout.closeDrawer(GravityCompat.START);
        return false;
    }
}
