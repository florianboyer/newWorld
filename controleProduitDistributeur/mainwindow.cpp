#include "mainwindow.h"
#include "ui_mainwindow.h"
#define URL2 "http://localhost/~fboyer/controleProducteur/json/jsonListeDesCdes.php"
#define URLENRPREPARED "http://localhost/~fboyer/controleProducteur/json/preparerLDC.php"
#include <QUrl>
#include <QUrlQuery>
#include <QJsonArray>
#include<QJsonObject>
#include<QCheckBox>
#include <QJsonDocument>
#include <QNetworkReply>

MainWindow::MainWindow(Dialog *monDialog ,QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    myNWM.setCookieJar(&cookieJar);
    QUrlQuery query;
}

void MainWindow::affichageNomProdcuteur(){
    QUrl serviceUrl(URL2);
    QUrl donnees;
    QUrlQuery query;
    donnees.setQuery(query);
    QByteArray postData(donnees.toString(QUrl::RemoveFragment).remove("?").toLatin1());

    QNetworkRequest request(serviceUrl);
    request.setHeader(QNetworkRequest::ContentTypeHeader, "application/x-www-form-urlencoded");
    QNetworkReply *reply1 = myNWM.post(request,postData);

    while(!reply1->isFinished())
    {
        qApp->processEvents();
    }
    QByteArray response_data = reply1->readAll();
    QJsonDocument jsonResponse = QJsonDocument::fromJson(response_data);

    jsArray=jsonResponse.array();
    int identiteProducteur=jsArray.count();
    /*Ma liste deroulante va venir recuperer ma view vListeProducteurPourPointsDeVente */
    ui->comboBoxNomProducteur->addItems(identiteProducteur);
}

MainWindow::~MainWindow()
{
    delete ui;
}
