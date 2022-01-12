#include <stdio.h>
#include <stdlib.h>
#include <GL/glut.h>
#include <math.h>
#include <time.h>
#include <string.h>

#define PI 3.1415926535898
#define window_width 600
#define window_height 480
double player1_y = -12;
double player2_y = 0;
int road_height = 0;
int car_height = 30;
int car_width = 70;
int car_y;
int y_road = 5;
double car[7];
double txStep[7] = {-3,8,4,-6,11,-5,9};
double x1[7];
double x2[7];
double distanceP1[7];
double distanceP2[7];
int interval = 1000/40;
char scoreAp[30];
char scoreBp[30];
int scoreA = 0;
int scoreB = 0;
GLfloat ang, ax1, ax2, ay1, ay2;
int chicken_radius = 25;
bool* keyArray = new bool[256];



void calcDistP1()
{
	road_height = 0;
	for(int i = 0; i < 7 ; i++)
	{
		float c1 = (-170) - (car[i]+35);
		float c2 = (player1_y-140) - (72-180+road_height);
		road_height+=40;
		distanceP1[i] = sqrt((c1*c1) + (c2*c2));
	}

}

void calcDistP2()
{

	road_height = 0;
	for(int i = 0; i < 7 ; i++)
	{
		float c1 = -180+320 - (car[i]+35);
		float c2 = (player2_y-155) - (72-180+road_height);
		road_height+=40;
		distanceP2[i] = sqrt((c1*c1) + (c2*c2));
	}

}

void keyPressed (unsigned char key, int x, int y)
{

	if(key == 'w')
	{
		player1_y += 4;


	}
	if(key == 'o')
	{
		player2_y += 4;

	}

	glutPostRedisplay();

}

void drawText(char *string, int x, int y)
{
	sprintf(scoreAp,"%d", scoreA);
	sprintf(scoreBp,"%d", scoreB);
  	glPushMatrix();
		glColor3f(1,1,1);
        glRasterPos2f(x, y);
        while(*string)
             glutBitmapCharacter(GLUT_BITMAP_HELVETICA_18,*string++);
	glPopMatrix();
}
void move(int value)
{


	for(int i=0;i<=6;i++)
	{

		if(car[i] >= (window_width/2-60) && txStep[i] > 0)
		{
			car[i] = 0-320;
		}
		if(car[i] <= -(window_width/2) && txStep[i] < 0)
		{
			car[i] = 0+250;
		}
		car[i] += txStep[i];
	}
	if(player1_y > 300)
	{
		scoreA ++ ;
		player1_y = 0 ;
	}
	if(distanceP1[0] < 30)
	{
		player1_y = 0;
	}
	if(distanceP1[1] < 30)
	{
		player1_y = 0;
	}
	if(distanceP1[2] < 30)
	{
		player1_y = 0;
	}
	if(distanceP1[3] < 30)
	{
		player1_y = 0;
	}
	if(distanceP1[4] < 30)
	{
		player1_y = 0;
	}
	if(distanceP1[5] < 30)
	{
		player1_y = 0;
	}
	if(distanceP1[6] < 30)
	{
		player1_y = 0;
	}


	if(player2_y > 300)
	{
		scoreB ++ ;
		player2_y = 0;
	}
		if(distanceP2[0] < 30)
	{
		player2_y = 0;
	}
		if(distanceP2[1] < 30)
	{
		player2_y = 0;
	}
		if(distanceP2[2] < 30)
	{
		player2_y = 0;
	}
		if(distanceP2[3] < 30)
	{
		player2_y = 0;
	}
		if(distanceP2[4] < 30)
	{
		player2_y = 0;
	}
		if(distanceP2[5] < 30)
	{
		player2_y = 0;
	}
		if(distanceP2[6] < 30)
	{
		player2_y = 0;
	}
	glutPostRedisplay();
	glutTimerFunc(interval, move, 1);

}
void drawBorder()
{
	//Borda superior
	glPushMatrix();
		glTranslatef(-window_width/2,-220,0);
		glTranslatef(0,window_width/2 + 100,0);
		glBegin(GL_QUADS);
		glColor3f(0,0,0);
		glVertex2f(window_width,65);
		glVertex2f(0,65);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();
		glPushMatrix();
		glTranslatef(-window_width/2,-220,0);
		glTranslatef(0,window_width/2 + 100,0);
		glBegin(GL_QUADS);
		glColor3f(1,0,0);
		glVertex2f(window_width,5);
		glVertex2f(0,5);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();
	//Borda Inferior
	glPushMatrix();
		glTranslatef(-window_width/2,-240,0);
		glTranslatef(0,window_width/2 - 310,0);
		glBegin(GL_QUADS);
		glColor3f(0,0,0);
		glVertex2f(window_width,65);
		glVertex2f(0,65);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();
}
void drawRoad()
{
	road_height = -370;
	glPushMatrix();
		glTranslatef(-window_width/2,-220,0);
		glTranslatef(0,window_width/2 + 100,0);
		glTranslatef(0, road_height, 0);
		glBegin(GL_QUADS);
		glColor3f(1,0,0);
		glVertex2f(window_width,5);
		glVertex2f(0,5);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();
	road_height+=60;
	glPushMatrix();
		glTranslatef(-window_width/2,-220,0);
		glTranslatef(0,window_width/2 + 100,0);
		glTranslatef(0, road_height, 0);
		glBegin(GL_QUADS);
		glColor3f(1,1,1);
		glVertex2f(window_width,5);
		glVertex2f(0,5);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();

	road_height+=40;
	glPushMatrix();
		glTranslatef(-window_width/2,-220,0);
		glTranslatef(0,window_width/2 + 100,0);
		glTranslatef(0, road_height, 0);
		glBegin(GL_QUADS);
		glColor3f(1,1,1);
		glVertex2f(window_width,5);
		glVertex2f(0,5);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();

	road_height+=40;
	glPushMatrix();
		glTranslatef(-window_width/2,-220,0);
		glTranslatef(0,window_width/2 + 100,0);
		glTranslatef(0, road_height, 0);
		glBegin(GL_QUADS);
		glColor3f(1,1,1);
		glVertex2f(window_width,5);
		glVertex2f(0,5);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();

	road_height+=40;
	glPushMatrix();
		glTranslatef(-window_width/2,-220,0);
		glTranslatef(0,window_width/2 + 100,0);
		glTranslatef(0, road_height, 0);
		glBegin(GL_QUADS);
		glColor3f(1,1,1);
		glVertex2f(window_width,5);
		glVertex2f(0,5);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();

	road_height+=40;
	glPushMatrix();
		glTranslatef(-window_width/2,-220,0);
		glTranslatef(0,window_width/2 + 100,0);
		glTranslatef(0, road_height, 0);
		glBegin(GL_QUADS);
		glColor3f(1,1,1);
		glVertex2f(window_width,5);
		glVertex2f(0,5);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();

	road_height+=40;
	glPushMatrix();
		glTranslatef(-window_width/2,-220,0);
		glTranslatef(0,window_width/2 + 100,0);
		glTranslatef(0, road_height, 0);
		glBegin(GL_QUADS);
		glColor3f(1,1,1);
		glVertex2f(window_width,5);
		glVertex2f(0,5);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();

	road_height+=40;
	glPushMatrix();
		glTranslatef(-window_width/2,-220,0);
		glTranslatef(0,window_width/2 + 100,0);
		glTranslatef(0, road_height, 0);
		glBegin(GL_QUADS);
		glColor3f(1,1,1);
		glVertex2f(window_width,5);
		glVertex2f(0,5);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();

	road_height+=40;
	glPushMatrix();
		glTranslatef(-window_width/2,-220,0);
		glTranslatef(0,window_width/2 + 100,0);
		glTranslatef(0, road_height, 0);
		glBegin(GL_QUADS);
		glColor3f(1,1,1);
		glVertex2f(window_width,5);
		glVertex2f(0,5);
		glVertex2f(0,0);
		glVertex2f(window_width,0);
		glEnd();
	glPopMatrix();
}
void drawChicken()
{
	glPushMatrix();
		glTranslatef(0, 80, 0);
		glPushMatrix();
			glTranslatef(-180,-(window_height/2)+10,0);
			glTranslatef(0,player1_y, 0);
			glPointSize(15);
			glBegin(GL_POINTS);
				glColor3f(1,0.9,0);
				glVertex2f(5,5);
			glEnd();
			glTranslatef(4,12,0);
			glPointSize(12);
			glBegin(GL_POINTS);
			glEnable(GL_SMOOTH);
				glColor3f(1,0.8,0);
				glVertex2f(5,5);
			glEnd();
		glTranslated(1,2,0);
		glPointSize(4);
			glBegin(GL_POINTS);
				glColor3f(0,0,0);
				glVertex2f(5,5);
			glEnd();
		glPopMatrix();
	glPopMatrix();

	glPushMatrix();
	glTranslatef(-178,-134,0);
	glTranslatef(0, player1_y, 0 );
	glPushMatrix();

		glRotated(-40,0,0,1);

		glBegin(GL_TRIANGLES);
		glVertex2f(12,12);
		glVertex2f(12,5);
		glVertex2f(5,12);
	glEnd();
	glPopMatrix();
	glPopMatrix();

	glPopMatrix();
	GLfloat points = 500;
	ax1 = 15.0f, ay1 = 15.0f;
	glPushMatrix();
		glEnable(GL_BLEND);
		glBlendFunc(GL_SRC_ALPHA, GL_ONE_MINUS_SRC_ALPHA);
        glTranslatef(-170,-140, 1);
        glTranslatef(0,player1_y,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 0);
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax1, sin(ang)*ay1);
        }
        glEnd();
    glPopMatrix();

    ax1 = 5.0f, ay1 = 2.0f;
	glPushMatrix();
        glTranslatef(-180,-155, 1);
        glTranslatef(0,player1_y,0);
        glRotated(25,0,0,1);
        glBegin(GL_POLYGON);
        glColor4f(0, 0, 0, 1);
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax1, sin(ang)*ay1);
        }
        glEnd();


    glPopMatrix();
    glPushMatrix();
     glTranslatef(-175,-155, 0);
        glTranslatef(0,player1_y,0);
        glRotated(25,0,0,1);
        glBegin(GL_POLYGON);
        glColor4f(0, 0, 0, 1);
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax1, sin(ang)*ay1);
        }
        glEnd();
    glPopMatrix();


	//Player2
	glPushMatrix();
		glTranslatef(320, 70, 0);
		glPushMatrix();
			glTranslatef(-180,-(window_height/2)+10,0);
			glTranslatef(0,player2_y, 0);
			glPointSize(15);
			glBegin(GL_POINTS);
				glColor3f(1,0.9,0);
				glVertex2f(5,5);
			glEnd();
			glTranslatef(4,12,0);
			glPointSize(12);
			glBegin(GL_POINTS);
			glEnable(GL_SMOOTH);
				glColor3f(1,0.8,0);
				glVertex2f(5,5);
			glEnd();
		glTranslated(1,2,0);
		glPointSize(4);
			glBegin(GL_POINTS);
				glColor3f(0,0,0);
				glVertex2f(5,5);
			glEnd();
		glPopMatrix();
	glPopMatrix();

	glPushMatrix();
		glTranslatef(142,-144,0);
		glTranslatef(0, player2_y, 0 );
		glPushMatrix();
			glRotated(-40,0,0,1);
			glBegin(GL_TRIANGLES);
				glVertex2f(12,12);
				glVertex2f(12,5);
				glVertex2f(5,12);
			glEnd();
		glPopMatrix();
	glPopMatrix();

	glPopMatrix();

	ax1 = 15.0f, ay1 = 15.0f;
	glPushMatrix();
		glEnable(GL_BLEND);
		glBlendFunc(GL_SRC_ALPHA, GL_ONE_MINUS_SRC_ALPHA);
        glTranslatef(150,-150, 1);
        glTranslatef(0,player2_y,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 0);
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax1, sin(ang)*ay1);
        }
        glEnd();
    glPopMatrix();

    ax1 = 5.0f, ay1 = 2.0f;
	glPushMatrix();
        glTranslatef(140,-165, 1);
        glTranslatef(0,player2_y,0);
        glRotated(25,0,0,1);
        glBegin(GL_POLYGON);
        glColor4f(0, 0, 0, 1);
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax1, sin(ang)*ay1);
        }
        glEnd();


    glPopMatrix();
    glPushMatrix();
     glTranslatef(145,-165, 1);
        glTranslatef(0,player2_y,0);
        glRotated(25,0,0,1);
        glBegin(GL_POLYGON);
        glColor4f(0, 0, 0, 1);
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax1, sin(ang)*ay1);
        }
        glEnd();
    glPopMatrix();






}
void drawCar()
{
	int car_y2 = 72;
	glTranslatef(0,-180,0);
	//Carro1
	car_y = 57;
	glPushMatrix();
		glTranslatef(car[0],car_y,0);
		glBegin(GL_QUADS);
			glColor3f(0,0,0);
			glVertex2f(car_width,car_height);
			glVertex2f(0,car_height);
			glVertex2f(0,0);
			glVertex2f(car_width,0);
		glEnd();
		ax2 = 7, ay2 = 7;
		glTranslatef(5,5,0);
        glBegin(GL_POLYGON);
			glColor4f(0, 1, 0, 1);
			GLfloat points = 500;
			for (int i = 0; i < points; i++)
			{
				ang = (2 * PI*i) / points;
				glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
			}
        glEnd();
		glTranslatef(60,0,0);
        glBegin(GL_POLYGON);
			glColor4f(0, 1, 0, 1);
			for (int i = 0; i < points; i++)
			{
				ang = (2 * PI*i) / points;
				glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
			}
		glEnd();
	glPopMatrix();
	ax2 = 40.0f, ay2 = 16.0f;
	glPushMatrix();
        glTranslatef(35,car_y2, 0);
        glTranslatef(car[0],0,0);
        glBegin(GL_POLYGON);
			glColor4f(0, 1, 0, 0);
			for (int i = 0; i < points; i++)
			{
				ang = (2 * PI*i) / points;
				glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
			}
        glEnd();

        glPointSize(10);
        glTranslatef(-5,0,0);
        glBegin(GL_POINTS);
        glColor3f(1,1,0);
        glVertex2f(25,5);
		glVertex2f(10,5);
		glVertex2f(-5,5);
		glVertex2f(-20,5);
        glEnd();
    glPopMatrix();

	car_y2 += 40;
	car_y += 40;

	//Carro2
		glPushMatrix();
		glTranslatef(car[1],car_y,0);
		glBegin(GL_QUADS);
		glColor3f(0,0,0);
		glVertex2f(car_width,car_height);
		glVertex2f(0,car_height);
		glVertex2f(0,0);
		glVertex2f(car_width,0);
		glEnd();

	ax2 = 7, ay2 = 7;
	glTranslatef(5,5,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);

		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();

		glTranslatef(60,0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);


		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();
	glPopMatrix();
	ax2 = 40.0f, ay2 = 16.0f;
	glPushMatrix();
        glTranslatef(35,car_y2, 0);
        glTranslatef(car[1],0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 0);
        //GLfloat points = 500;
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }

        glEnd();

        glPointSize(10);
        glTranslatef(-5,0,0);
        glBegin(GL_POINTS);
        glColor3f(1,0,1);
        glVertex2f(25,5);
		glVertex2f(10,5);
		glVertex2f(-5,5);
		glVertex2f(-20,5);
        glEnd();
    glPopMatrix();

	car_y2 += 40;
	car_y += 40;
	//Estrada3
	//Carro3
		glPushMatrix();
		glTranslatef(car[2],car_y,0);
		glBegin(GL_QUADS);
		glColor3f(0,0,0);
		glVertex2f(car_width,car_height);
		glVertex2f(0,car_height);
		glVertex2f(0,0);
		glVertex2f(car_width,0);
		glEnd();

	ax2 = 7, ay2 = 7;
	glTranslatef(5,5,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);
		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();

		glTranslatef(60,0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);


		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();
	glPopMatrix();
	ax2 = 40.0f, ay2 = 16.0f;
	glPushMatrix();
        glTranslatef(35,car_y2, 0);
        glTranslatef(car[2],0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 0);
        //GLfloat points = 500;
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }

        glEnd();

        glPointSize(10);
        glTranslatef(-5,0,0);
        glBegin(GL_POINTS);
        glColor3f(1,0,0);
        glVertex2f(25,5);
		glVertex2f(10,5);
		glVertex2f(-5,5);
		glVertex2f(-20,5);
        glEnd();
    glPopMatrix();
	car_y2 += 40;
	car_y += 40;
	//Estrada4
	//Carro4
		glPushMatrix();
		glTranslatef(car[3],car_y,0);
		glBegin(GL_QUADS);
		glColor3f(0,0,0);
		glVertex2f(car_width,car_height);
		glVertex2f(0,car_height);
		glVertex2f(0,0);
		glVertex2f(car_width,0);
		glEnd();

	ax2 = 7, ay2 = 7;
	glTranslatef(5,5,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);
		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();

		glTranslatef(60,0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);


		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();
	glPopMatrix();
	ax2 = 40.0f, ay2 = 16.0f;
	glPushMatrix();
        glTranslatef(35,car_y2, 0);
        glTranslatef(car[3],0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 0);
        //GLfloat points = 500;
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }

        glEnd();

        glPointSize(10);
        glTranslatef(-5,0,0);
        glBegin(GL_POINTS);
        glColor3f(0,1,1);
        glVertex2f(25,5);
		glVertex2f(10,5);
		glVertex2f(-5,5);
		glVertex2f(-20,5);
        glEnd();
    glPopMatrix();
	car_y2 += 40;
	car_y += 40;	glPushMatrix();
		glTranslatef(car[4],car_y,0);
		glBegin(GL_QUADS);
		glColor3f(0,0,0);
		glVertex2f(car_width,car_height);
		glVertex2f(0,car_height);
		glVertex2f(0,0);
		glVertex2f(car_width,0);
		glEnd();

	ax2 = 7, ay2 = 7;
	glTranslatef(5,5,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);
		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();

		glTranslatef(60,0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);


		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();
	glPopMatrix();
	ax2 = 40.0f, ay2 = 16.0f;
	glPushMatrix();
        glTranslatef(35,car_y2, 0);
        glTranslatef(car[4],0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 0);
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }

        glEnd();

        glPointSize(10);
        glTranslatef(-5,0,0);
        glBegin(GL_POINTS);
        glColor3f(1,0.55,0);
        glVertex2f(25,5);
		glVertex2f(10,5);
		glVertex2f(-5,5);
		glVertex2f(-20,5);
        glEnd();
    glPopMatrix();
	car_y2 += 40;
	car_y += 40;	glPushMatrix();
		glTranslatef(car[5],car_y,0);
		glBegin(GL_QUADS);
		glColor3f(0,0,0);
		glVertex2f(car_width,car_height);
		glVertex2f(0,car_height);
		glVertex2f(0,0);
		glVertex2f(car_width,0);
		glEnd();

	ax2 = 7, ay2 = 7;
	glTranslatef(5,5,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);
		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();

		glTranslatef(60,0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);


		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();
	glPopMatrix();
	ax2 = 40.0f, ay2 = 16.0f;
	glPushMatrix();
        glTranslatef(35,car_y2, 0);
        glTranslatef(car[5],0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 0);
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }

        glEnd();

        glPointSize(10);
        glTranslatef(-5,0,0);
        glBegin(GL_POINTS);
        glColor3f(0.5,0,0.5);
        glVertex2f(25,5);
		glVertex2f(10,5);
		glVertex2f(-5,5);
		glVertex2f(-20,5);
        glEnd();
    glPopMatrix();
	car_y2 += 40;
	car_y += 40;

		glPushMatrix();
		glTranslatef(car[6],car_y,0);
		glBegin(GL_QUADS);
		glColor3f(0,0,0);
		glVertex2f(car_width,car_height);
		glVertex2f(0,car_height);
		glVertex2f(0,0);
		glVertex2f(car_width,0);
		glEnd();

	ax2 = 7, ay2 = 7;
	glTranslatef(5,5,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);
		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();

		glTranslatef(60,0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 1);


		for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }
        glEnd();
	glPopMatrix();
	ax2 = 40.0f, ay2 = 16.0f;
	glPushMatrix();
        glTranslatef(35,car_y2, 0);
        glTranslatef(car[6],0,0);
        glBegin(GL_POLYGON);
        glColor4f(0, 1, 0, 0);
        for (int i = 0; i < points; i++)
        {
            ang = (2 * PI*i) / points;
            glVertex2f(cos(ang)*ax2, sin(ang)*ay2);
        }

        glEnd();

        glPointSize(10);
        glTranslatef(-5,0,0);
        glBegin(GL_POINTS);
        glColor3f(0.54,0.54,0.54);
        glVertex2f(25,5);
		glVertex2f(10,5);
		glVertex2f(-5,5);
		glVertex2f(-20,5);
        glEnd();
    glPopMatrix();
	car_y2 += 40;
	car_y += 40;

	calcDistP1();
	calcDistP2();

}
void draw()
{
	drawBorder();
	drawRoad();
	drawChicken();
	drawCar();

	drawText(scoreAp, -200, 382);
	drawText(scoreBp, 200, 382);
	drawText("PLACAR", -40, 382);
}

void display()
{

	glMatrixMode(GL_MODELVIEW);
	glLoadIdentity();

    glClearColor(0,0,0,0);
	glClear(GL_COLOR_BUFFER_BIT);
	glEnable(GL_BLEND);
	glBlendFunc(GL_SRC_ALPHA, GL_ONE_MINUS_SRC_ALPHA);
    glClearColor(0.75,0.75,0.75,0.3);
	glClear(GL_COLOR_BUFFER_BIT);
	glTranslatef(window_width / 2, window_height / 2, 0);
	glViewport(0, 0, window_width, window_height);
	draw();
	glFlush();
}

void screen(GLsizei w, GLsizei h)
{
	glMatrixMode(GL_PROJECTION);
	glLoadIdentity();

	gluOrtho2D(0, window_width, 0, window_height);
	glMatrixMode(GL_MODELVIEW);
}

int main(int argc, char** argv)
{

	glutInit(&argc, argv);
	glutInitDisplayMode(GLUT_SINGLE | GLUT_RGB);
	glutInitWindowSize(window_width, window_height);
	glutInitWindowPosition(100, 100);
	glutCreateWindow("Freeway");
	glutKeyboardFunc(keyPressed);

	glutReshapeFunc(screen);
	glutDisplayFunc(display);
	glutTimerFunc(interval, move, 0);
	glutMainLoop();

}

