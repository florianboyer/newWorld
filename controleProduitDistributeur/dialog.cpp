#include "dialog.h"
#include "ui_dialog.h"
#include <QNetworkRequest>
#include <QUrl>
#include <QUrlQuery>
#include <QJsonObject>
#include <QJsonDocument>
#include <QNetworkReply>
//#define URL "http://web2018.btsinfogap.org/newWorld/jsonLogin.php"
#define URL "http://localhost/~fboyer/controleProducteur/json/jsonLogin.php"
//penser à l'https
Dialog::Dialog(QWidget *parent) :
    QDialog(parent),
    ui(new Ui::Dialog)
{
    ui->setupUi(this);
    myNWM.setCookieJar(&cookieJar);
}

Dialog::~Dialog()
{
    delete ui;
}

void Dia#include "mainwindow.h"
#include "ui_mainwindow.h"log::on_pushButtonOk_clicked()
{
    //verif du user et du pass
    QUrl serviceUrl(URL);
    QUrl donnees;
    QUrlQuery query;
    query.addQueryItem("login", ui->lineEditLogin->text());
    query.addQueryItem("password",ui->lineEditMDP->text());
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
    ui->labelMDP->setText(response_data);
    QJsonDocument jsonResponse = QJsonDocument::fromJson(response_data);
    qDebug()<<jsonResponse.object();
    qDebug()<<jsonResponse.object().count();
    if(jsonResponse.object().count()==6)//0.1.2 et nom prenom identifiant
    {
        //recupération des infos
        nom=jsonResponse.object()["nom"].toString();
        prenom=jsonResponse.object()["prenom"].toString();
        identifiant=jsonResponse.object()["identifiant"].toString();
        //si c'est bon
        accept();
    }
    else
    {
        ui->label->setStyleSheet("color:red;");
    }
    //nettoyage de reply1
    reply1->deleteLater();
    //sinon on indique que ce n'est pas bon
}

void Dialog::on_pushButtonAnnuler_clicked()
{
    reject();
}
