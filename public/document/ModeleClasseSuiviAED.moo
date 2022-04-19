<?xml version="1.0" encoding="UTF-8"?>
<?PowerDesigner AppLocale="UTF16" ID="{ED91CBDD-B866-45D9-8229-6E6E6045FD91}" Label="" LastModificationDate="1642509670" Name="ModeleClasseSuiviAED" Objects="100" Symbols="43" Target="Analyse" TargetLink="Reference" Type="{18112060-1A4B-11D1-83D9-444553540000}" signature="CLD_OBJECT_MODEL" version="15.1.0.2850"?>
<!-- Veuillez ne pas modifier ce fichier -->

<Model xmlns:a="attribute" xmlns:c="collection" xmlns:o="object">

<o:RootObject Id="o1">
<c:Children>
<o:Model Id="o2">
<a:ObjectID>ED91CBDD-B866-45D9-8229-6E6E6045FD91</a:ObjectID>
<a:Name>ModeleClasseSuiviAED</a:Name>
<a:Code>ModeleClasseSuiviAED</a:Code>
<a:CreationDate>1627030929</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505338</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:PackageOptionsText>[FolderOptions]

[FolderOptions\Class Diagram Objects]
GenerationCheckModel=Yes
GenerationPath=
GenerationOptions=
GenerationTasks=
GenerationTargets=
GenerationSelections=</a:PackageOptionsText>
<a:ModelOptionsText>[ModelOptions]

[ModelOptions\Cld]
CaseSensitive=No
DisplayName=Yes
EnableTrans=No
EnableRequirements=No
ShowClss=No
DeftAttr=int
DeftMthd=
DeftParm=int
DeftCont=
DomnDttp=Yes
DomnChck=No
DomnRule=No
SupportDelay=No
PreviewEditable=Yes
AutoRealize=No
DttpFullName=Yes
DeftClssAttrVisi=private
VBNetPreprocessingSymbols=
CSharpPreprocessingSymbols=

[ModelOptions\Cld\NamingOptionsTemplates]

[ModelOptions\Cld\ClssNamingOptions]

[ModelOptions\Cld\ClssNamingOptions\CLDPCKG]

[ModelOptions\Cld\ClssNamingOptions\CLDPCKG\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDPCKG\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDDOMN]

[ModelOptions\Cld\ClssNamingOptions\CLDDOMN\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDDOMN\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDCLASS]

[ModelOptions\Cld\ClssNamingOptions\CLDCLASS\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDCLASS\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDINTF]

[ModelOptions\Cld\ClssNamingOptions\CLDINTF\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDINTF\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDACTR]

[ModelOptions\Cld\ClssNamingOptions\UCDACTR\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDACTR\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDUCAS]

[ModelOptions\Cld\ClssNamingOptions\UCDUCAS\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDUCAS\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDOBJT]

[ModelOptions\Cld\ClssNamingOptions\SQDOBJT\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDOBJT\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDMSSG]

[ModelOptions\Cld\ClssNamingOptions\SQDMSSG\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDMSSG\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CPDCOMP]

[ModelOptions\Cld\ClssNamingOptions\CPDCOMP\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CPDCOMP\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDATTR]

[ModelOptions\Cld\ClssNamingOptions\CLDATTR\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDATTR\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDMETHOD]

[ModelOptions\Cld\ClssNamingOptions\CLDMETHOD\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDMETHOD\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDPARM]

[ModelOptions\Cld\ClssNamingOptions\CLDPARM\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDPARM\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPORT]

[ModelOptions\Cld\ClssNamingOptions\OOMPORT\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPORT\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPART]

[ModelOptions\Cld\ClssNamingOptions\OOMPART\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPART\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDASSC]

[ModelOptions\Cld\ClssNamingOptions\CLDASSC\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDASSC\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDASSC]

[ModelOptions\Cld\ClssNamingOptions\UCDASSC\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDASSC\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\GNRLLINK]

[ModelOptions\Cld\ClssNamingOptions\GNRLLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\GNRLLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RQLINK]

[ModelOptions\Cld\ClssNamingOptions\RQLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RQLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RLZSLINK]

[ModelOptions\Cld\ClssNamingOptions\RLZSLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RLZSLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DEPDLINK]

[ModelOptions\Cld\ClssNamingOptions\DEPDLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DEPDLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMACTV]

[ModelOptions\Cld\ClssNamingOptions\OOMACTV\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMACTV\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\ACDOBST]

[ModelOptions\Cld\ClssNamingOptions\ACDOBST\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\ACDOBST\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\STAT]

[ModelOptions\Cld\ClssNamingOptions\STAT\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\STAT\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDNODE]

[ModelOptions\Cld\ClssNamingOptions\DPDNODE\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDNODE\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDCMPI]

[ModelOptions\Cld\ClssNamingOptions\DPDCMPI\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDCMPI\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDASSC]

[ModelOptions\Cld\ClssNamingOptions\DPDASSC\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDASSC\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMVAR]

[ModelOptions\Cld\ClssNamingOptions\OOMVAR\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMVAR\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FILO]

[ModelOptions\Cld\ClssNamingOptions\FILO\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=&quot;\/:*?&lt;&gt;|&quot;
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FILO\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_. &quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMEOBJ]

[ModelOptions\Cld\ClssNamingOptions\FRMEOBJ\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMEOBJ\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMELNK]

[ModelOptions\Cld\ClssNamingOptions\FRMELNK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMELNK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DefaultClass]

[ModelOptions\Cld\ClssNamingOptions\DefaultClass\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DefaultClass\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; +-*/!=&lt;&gt;&#39;&quot;&quot;().&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Generate]

[ModelOptions\Generate\Cdm]
CheckModel=Yes
SaveLinks=Yes
NameToCode=No
Notation=2

[ModelOptions\Generate\Pdm]
CheckModel=Yes
SaveLinks=Yes
ORMapping=No
NameToCode=No
BuildTrgr=No
TablePrefix=
RefrUpdRule=RESTRICT
RefrDelRule=RESTRICT
IndxPKName=%TABLE%_PK
IndxAKName=%TABLE%_AK
IndxFKName=%REFR%_FK
IndxThreshold=
ColnFKName=%.3:PARENT%_%COLUMN%
ColnFKNameUse=No

[ModelOptions\Generate\Xsm]
CheckModel=Yes
SaveLinks=Yes
ORMapping=No
NameToCode=No</a:ModelOptionsText>
<c:ObjectLanguage>
<o:Shortcut Id="o3">
<a:ObjectID>CEADCAA4-BFDA-4D25-84EE-8920DB6F3753</a:ObjectID>
<a:Name>Analyse</a:Name>
<a:Code>Analysis</a:Code>
<a:CreationDate>1627030929</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627030929</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:TargetStereotype/>
<a:TargetID>87317290-AF03-469F-BC1E-99593F18A4AB</a:TargetID>
<a:TargetClassID>1811206C-1A4B-11D1-83D9-444553540000</a:TargetClassID>
</o:Shortcut>
</c:ObjectLanguage>
<c:ClassDiagrams>
<o:ClassDiagram Id="o4">
<a:ObjectID>13F16F47-01C6-4AE5-9695-8C51D1D4F20D</a:ObjectID>
<a:Name>DiagrammeClasses_1</a:Name>
<a:Code>DiagrammeClasses_1</a:Code>
<a:CreationDate>1627030929</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642509329</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DisplayPreferences>[DisplayPreferences]

[DisplayPreferences\CLD]

[DisplayPreferences\General]
Adjust to text=Yes
Snap Grid=No
Constrain Labels=Yes
Display Grid=No
Show Page Delimiter=Yes
Grid size=0
Graphic unit=2
Window color=255, 255, 255
Background image=
Background mode=8
Watermark image=
Watermark mode=8
Show watermark on screen=No
Gradient mode=0
Gradient end color=255, 255, 255
Show Swimlane=No
SwimlaneVert=Yes
TreeVert=No
CompDark=0

[DisplayPreferences\Object]
Mode=0
Trunc Length=80
Word Length=80
Word Text=!&quot;&quot;#$%&amp;&#39;()*+,-./:;&lt;=&gt;?@[\]^_`{|}~
Shortcut IntIcon=Yes
Shortcut IntLoct=Yes
Shortcut IntFullPath=No
Shortcut IntLastPackage=Yes
Shortcut ExtIcon=Yes
Shortcut ExtLoct=No
Shortcut ExtFullPath=No
Shortcut ExtLastPackage=Yes
Shortcut ExtIncludeModl=Yes
EObjShowStrn=Yes
ExtendedObject.Comment=No
ExtendedObject.IconPicture=No
ExtendedObject_SymbolLayout=
ELnkShowStrn=Yes
ELnkShowName=Yes
ExtendedLink_SymbolLayout=
FileObject.Stereotype=No
FileObject.DisplayName=Yes
FileObject.LocationOrName=No
FileObject.IconPicture=No
FileObject.IconMode=Yes
FileObject_SymbolLayout=
PckgShowStrn=Yes
Package.Comment=No
Package.IconPicture=No
Package_SymbolLayout=
Display Model Version=Yes
Class.IconPicture=No
Class_SymbolLayout=
Interface.IconPicture=No
Interface_SymbolLayout=
Port.IconPicture=No
Port_SymbolLayout=
ClssShowSttr=Yes
Class.Comment=No
ClssShowCntr=Yes
ClssShowAttr=Yes
ClssAttrTrun=No
ClssAttrMax=3
ClssShowMthd=Yes
ClssMthdTrun=No
ClssMthdMax=3
ClssShowInnr=Yes
IntfShowSttr=Yes
Interface.Comment=No
IntfShowAttr=Yes
IntfAttrTrun=No
IntfAttrMax=3
IntfShowMthd=Yes
IntfMthdTrun=No
IntfMthdMax=3
IntfShowCntr=Yes
IntfShowInnr=Yes
PortShowName=Yes
PortShowType=No
PortShowMult=No
AttrShowVisi=Yes
AttrVisiFmt=1
AttrShowStrn=Yes
AttrShowDttp=Yes
AttrShowDomn=No
AttrShowInit=Yes
MthdShowVisi=Yes
MthdVisiFmt=1
MthdShowStrn=Yes
MthdShowRttp=Yes
MthdShowParm=Yes
AsscShowName=No
AsscShowCntr=Yes
AsscShowRole=Yes
AsscShowOrdr=Yes
AsscShowMult=Yes
AsscMultStr=Yes
AsscShowStrn=No
GnrlShowName=No
GnrlShowStrn=Yes
GnrlShowCntr=Yes
RlzsShowName=No
RlzsShowStrn=Yes
RlzsShowCntr=Yes
DepdShowName=No
DepdShowStrn=Yes
DepdShowCntr=Yes
RqlkShowName=No
RqlkShowStrn=Yes
RqlkShowCntr=Yes

[DisplayPreferences\Symbol]

[DisplayPreferences\Symbol\FRMEOBJ]
STRNFont=Arial,8,N
STRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
LABLFont=Arial,8,N
LABLFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=6000
Height=2000
Brush color=255 255 255
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=64
Brush gradient color=192 192 192
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 255 128 128
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\FRMELNK]
CENTERFont=Arial,8,N
CENTERFont color=0, 0, 0
Line style=2
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Brush color=255 255 255
Fill Color=Yes
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\FILO]
OBJSTRNFont=Arial,8,N
OBJSTRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
LCNMFont=Arial,8,N
LCNMFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=Yes
Keep center=Yes
Keep size=No
Width=2400
Height=2400
Brush color=255 255 255
Fill Color=No
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 0 0 255
Shadow color=192 192 192
Shadow=-1

[DisplayPreferences\Symbol\CLDPCKG]
STRNFont=Arial,8,N
STRNFont color=0 0 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0 0 0
LABLFont=Arial,8,N
LABLFont color=0 0 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=4800
Height=3600
Brush color=255 255 192
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 178 178 178
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDCLASS]
STRNFont=Arial,8,N
STRNFont color=0 0 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0 0 0
CNTRFont=Arial,8,N
CNTRFont color=0 0 0
AttributesFont=Arial,8,N
AttributesFont color=0 0 0
ClassPrimaryAttributeFont=Arial,8,U
ClassPrimaryAttributeFont color=0 0 0
OperationsFont=Arial,8,N
OperationsFont color=0 0 0
InnerClassifiersFont=Arial,8,N
InnerClassifiersFont color=0 0 0
LABLFont=Arial,8,N
LABLFont color=0 0 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=4800
Height=3600
Brush color=233 202 131
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 128 0 0
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDINTF]
STRNFont=Arial,8,N
STRNFont color=0 0 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0 0 0
CNTRFont=Arial,8,N
CNTRFont color=0 0 0
AttributesFont=Arial,8,N
AttributesFont color=0 0 0
OperationsFont=Arial,8,N
OperationsFont color=0 0 0
InnerClassifiersFont=Arial,8,N
InnerClassifiersFont color=0 0 0
LABLFont=Arial,8,N
LABLFont color=0 0 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=4800
Height=3600
Brush color=205 156 156
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 128 0 0
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\OOMPORT]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0 0 0
AutoAdjustToText=No
Keep aspect=No
Keep center=No
Keep size=No
Width=825
Height=800
Brush color=250 241 211
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 128 64 0
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDASSC]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0 0 0
MULAFont=Arial,8,N
MULAFont color=0 0 0
Line style=2
Pen=1 0 128 0 64
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\INNERLINK]
Line style=2
Pen=1 0 128 0 64
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDACLK]
Line style=2
Pen=2 0 128 0 64
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\GNRLLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0 0 0
Line style=2
Pen=1 0 128 0 64
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\RLZSLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0 0 0
Line style=2
Pen=3 0 128 0 64
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\RQLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0 0 0
Line style=2
Pen=1 0 128 0 64
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\DEPDLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0 0 0
Line style=2
Pen=2 0 128 0 64
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\USRDEPD]
OBJXSTRFont=Arial,8,N
OBJXSTRFont color=0 0 0
Line style=2
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Brush color=255 255 255
Fill Color=Yes
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=2 0 128 0 64
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\Free Symbol]
Free TextFont=Arial,8,N
Free TextFont color=0 0 0
Line style=2
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Brush color=255 255 255
Fill Color=Yes
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 128 64 0
Shadow color=192 192 192
Shadow=0</a:DisplayPreferences>
<a:PaperSize>(8268, 11693)</a:PaperSize>
<a:PageMargins>((315,354), (433,354))</a:PageMargins>
<a:PageOrientation>1</a:PageOrientation>
<a:PaperSource>15</a:PaperSource>
<c:Symbols>
<o:PolylineSymbol Id="o5">
<a:CreationDate>1642505774</a:CreationDate>
<a:ModificationDate>1642507175</a:ModificationDate>
<a:SourceTextOffset>(-2212, 512)</a:SourceTextOffset>
<a:DestinationTextOffset>(1987, -287)</a:DestinationTextOffset>
<a:CenterText>Positionner</a:CenterText>
<a:SourceText>1..*</a:SourceText>
<a:DestinationText>1..1</a:DestinationText>
<a:Rect>((-22649,-18825), (-16501,-13275))</a:Rect>
<a:ListOfPoints>((-19500,-18825),(-19500,-13275))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o6">
<a:CreationDate>1642505794</a:CreationDate>
<a:ModificationDate>1642509646</a:ModificationDate>
<a:CenterTextOffset>(1125, -225)</a:CenterTextOffset>
<a:CenterText>Concerner</a:CenterText>
<a:SourceText>1..*</a:SourceText>
<a:DestinationText>1..1</a:DestinationText>
<a:Rect>((-34349,-4425), (-23175,-163))</a:Rect>
<a:ListOfPoints>((-32475,-4425),(-32475,-525),(-23175,-525))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o7">
<a:CreationDate>1642505851</a:CreationDate>
<a:ModificationDate>1642507319</a:ModificationDate>
<a:CenterTextOffset>(3150, -375)</a:CenterTextOffset>
<a:CenterText>Lier</a:CenterText>
<a:SourceText>1..*</a:SourceText>
<a:DestinationText>1..1</a:DestinationText>
<a:Rect>((-30075,-14449), (-22650,-11325))</a:Rect>
<a:ListOfPoints>((-30075,-11325),(-30075,-13275),(-22650,-13275))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o8">
<a:CreationDate>1642506317</a:CreationDate>
<a:ModificationDate>1642507113</a:ModificationDate>
<a:CenterText>Joindre</a:CenterText>
<a:SourceText>1..*</a:SourceText>
<a:DestinationText>1..1</a:DestinationText>
<a:Rect>((-38774,-18450), (-34876,-11025))</a:Rect>
<a:ListOfPoints>((-36900,-18450),(-36900,-11025))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o9">
<a:CreationDate>1642506330</a:CreationDate>
<a:ModificationDate>1642509670</a:ModificationDate>
<a:CenterTextOffset>(-3825, 75)</a:CenterTextOffset>
<a:SourceTextOffset>(1537, 388)</a:SourceTextOffset>
<a:DestinationTextOffset>(1912, 887)</a:DestinationTextOffset>
<a:CenterText>Associer</a:CenterText>
<a:SourceText>1..1</a:SourceText>
<a:DestinationText>1..*</a:DestinationText>
<a:Rect>((-16800,-24962), (-3376,-22976))</a:Rect>
<a:ListOfPoints>((-5925,-23325),(-5925,-24450),(-16800,-24450))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o10">
<a:CreationDate>1642509329</a:CreationDate>
<a:ModificationDate>1642509425</a:ModificationDate>
<a:CenterTextOffset>(4875, 150)</a:CenterTextOffset>
<a:SourceTextOffset>(-1312, -613)</a:SourceTextOffset>
<a:CenterText>Faire</a:CenterText>
<a:SourceText>1..1</a:SourceText>
<a:DestinationText>1..*</a:DestinationText>
<a:Rect>((-18599,-8250), (-4950,-6013))</a:Rect>
<a:ListOfPoints>((-16275,-8250),(-16275,-6750),(-4950,-6750))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:GeneralizationSymbol Id="o11">
<a:CreationDate>1629724897</a:CreationDate>
<a:ModificationDate>1629724897</a:ModificationDate>
<a:Rect>((-8550,12825), (-1875,17025))</a:Rect>
<a:ListOfPoints>((-8550,12825),(-8550,17025),(-1875,17025))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:ArrowStyle>7</a:ArrowStyle>
<a:LineColor>4194432</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o12"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o13"/>
</c:DestinationSymbol>
<c:Object>
<o:Generalization Ref="o14"/>
</c:Object>
</o:GeneralizationSymbol>
<o:PolylineSymbol Id="o15">
<a:CreationDate>1627034331</a:CreationDate>
<a:ModificationDate>1627057704</a:ModificationDate>
<a:CenterTextOffset>(2025, 750)</a:CenterTextOffset>
<a:SourceTextOffset>(-975, 962)</a:SourceTextOffset>
<a:CenterText>Etre</a:CenterText>
<a:SourceText>1..1</a:SourceText>
<a:DestinationText>1..*</a:DestinationText>
<a:Rect>((-299,19463), (9225,25584))</a:Rect>
<a:ListOfPoints>((9225,23588),(1575,23588),(1575,19463))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o16">
<a:CreationDate>1627035738</a:CreationDate>
<a:ModificationDate>1629722580</a:ModificationDate>
<a:CenterTextOffset>(-3600, -600)</a:CenterTextOffset>
<a:SourceTextOffset>(2475, -313)</a:SourceTextOffset>
<a:DestinationTextOffset>(-1125, 2713)</a:DestinationTextOffset>
<a:CenterText>Suivre</a:CenterText>
<a:SourceText>1..*</a:SourceText>
<a:DestinationText>1..1</a:DestinationText>
<a:Rect>((-7200,2475), (11400,9646))</a:Rect>
<a:ListOfPoints>((-7200,9000),(11400,9000),(11400,2475))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o17">
<a:CreationDate>1627055982</a:CreationDate>
<a:ModificationDate>1642157891</a:ModificationDate>
<a:CenterTextOffset>(0, 300)</a:CenterTextOffset>
<a:SourceTextOffset>(2250, 1112)</a:SourceTextOffset>
<a:DestinationTextOffset>(-3600, -887)</a:DestinationTextOffset>
<a:CenterText>Appartenir</a:CenterText>
<a:SourceText>1..*</a:SourceText>
<a:DestinationText>1..1</a:DestinationText>
<a:Rect>((-675,-20149), (13800,-16976))</a:Rect>
<a:ListOfPoints>((-675,-18675),(13800,-18675))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o18">
<a:CreationDate>1627057793</a:CreationDate>
<a:ModificationDate>1628085510</a:ModificationDate>
<a:CenterTextOffset>(-75, 9750)</a:CenterTextOffset>
<a:SourceTextOffset>(-300, 1637)</a:SourceTextOffset>
<a:DestinationTextOffset>(-1125, -3437)</a:DestinationTextOffset>
<a:CenterText>Gerer</a:CenterText>
<a:SourceText>1..*</a:SourceText>
<a:DestinationText>1..1</a:DestinationText>
<a:Rect>((20213,-3975), (23812,15675))</a:Rect>
<a:ListOfPoints>((22650,-3975),(22575,-3975),(22575,15675))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o19">
<a:CreationDate>1627060194</a:CreationDate>
<a:ModificationDate>1627060194</a:ModificationDate>
<a:Rect>((-28012,6150), (-27912,6450))</a:Rect>
<a:ListOfPoints>((-28012,6450),(-28012,6150))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o20">
<a:CreationDate>1627061435</a:CreationDate>
<a:ModificationDate>1629725308</a:ModificationDate>
<a:CenterTextOffset>(-225, -1350)</a:CenterTextOffset>
<a:SourceTextOffset>(-1312, 388)</a:SourceTextOffset>
<a:DestinationTextOffset>(1762, 737)</a:DestinationTextOffset>
<a:CenterText>Ajouter</a:CenterText>
<a:SourceText>1..*</a:SourceText>
<a:DestinationText>1..1</a:DestinationText>
<a:Rect>((-26925,2175), (-15263,8149))</a:Rect>
<a:ListOfPoints>((-16650,2175),(-16650,6825),(-26925,6825))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o21">
<a:CreationDate>1627061642</a:CreationDate>
<a:ModificationDate>1627061692</a:ModificationDate>
<a:CenterTextOffset>(8100, 0)</a:CenterTextOffset>
<a:CenterText>Valider</a:CenterText>
<a:SourceText>1..*</a:SourceText>
<a:DestinationText>1..1</a:DestinationText>
<a:Rect>((-14474,1875), (9300,5012))</a:Rect>
<a:ListOfPoints>((-12600,1875),(-12600,4425),(9300,4425))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o22">
<a:CreationDate>1627061734</a:CreationDate>
<a:ModificationDate>1627062161</a:ModificationDate>
<a:CenterTextOffset>(-300, -2925)</a:CenterTextOffset>
<a:SourceTextOffset>(-1687, -737)</a:SourceTextOffset>
<a:DestinationTextOffset>(-1312, 887)</a:DestinationTextOffset>
<a:CenterText>Commenter</a:CenterText>
<a:SourceText>1..1</a:SourceText>
<a:DestinationText>1..*</a:DestinationText>
<a:Rect>((1800,-5175), (10425,975))</a:Rect>
<a:ListOfPoints>((10425,975),(4500,975),(4500,-5175))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o23">
<a:CreationDate>1628085602</a:CreationDate>
<a:ModificationDate>1628085675</a:ModificationDate>
<a:CenterTextOffset>(0, -75)</a:CenterTextOffset>
<a:SourceTextOffset>(1087, -962)</a:SourceTextOffset>
<a:DestinationTextOffset>(-1387, 1262)</a:DestinationTextOffset>
<a:CenterText>Lier</a:CenterText>
<a:SourceText>1..1</a:SourceText>
<a:DestinationText>1..*</a:DestinationText>
<a:Rect>((19126,-15600), (23549,-7350))</a:Rect>
<a:ListOfPoints>((21450,-7350),(21450,-15600))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o24">
<a:CreationDate>1629722693</a:CreationDate>
<a:ModificationDate>1629729874</a:ModificationDate>
<a:CenterTextOffset>(225, -2025)</a:CenterTextOffset>
<a:SourceTextOffset>(-937, 1787)</a:SourceTextOffset>
<a:CenterText>Appartenir 2</a:CenterText>
<a:SourceText>1..*</a:SourceText>
<a:DestinationText>1..1</a:DestinationText>
<a:Rect>((-33862,10725), (-23775,19425))</a:Rect>
<a:ListOfPoints>((-31575,10725),(-31575,19425),(-23775,19425))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:PolylineSymbol Id="o25">
<a:CreationDate>1629722738</a:CreationDate>
<a:ModificationDate>1629725394</a:ModificationDate>
<a:CenterTextOffset>(3150, 75)</a:CenterTextOffset>
<a:SourceTextOffset>(1912, 13)</a:SourceTextOffset>
<a:CenterText>Etre 2</a:CenterText>
<a:SourceText>1..*</a:SourceText>
<a:DestinationText>1..1</a:DestinationText>
<a:Rect>((-26625,9101), (-17925,11925))</a:Rect>
<a:ListOfPoints>((-26625,10125),(-26625,10275),(-17925,10275))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16512</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:GeneralizationSymbol Id="o26">
<a:CreationDate>1627034237</a:CreationDate>
<a:ModificationDate>1627056929</a:ModificationDate>
<a:Rect>((3628,4238), (16650,11039))</a:Rect>
<a:ListOfPoints>((16650,4238),(16650,11039),(3628,11039))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:ArrowStyle>7</a:ArrowStyle>
<a:LineColor>4194432</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o27"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o13"/>
</c:DestinationSymbol>
<c:Object>
<o:Generalization Ref="o28"/>
</c:Object>
</o:GeneralizationSymbol>
<o:GeneralizationSymbol Id="o29">
<a:CreationDate>1627034245</a:CreationDate>
<a:ModificationDate>1627056717</a:ModificationDate>
<a:Rect>((3172,14161), (16200,15161))</a:Rect>
<a:ListOfPoints>((16200,14661),(3172,14661))</a:ListOfPoints>
<a:CornerStyle>2</a:CornerStyle>
<a:ArrowStyle>7</a:ArrowStyle>
<a:LineColor>4194432</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o30"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o13"/>
</c:DestinationSymbol>
<c:Object>
<o:Generalization Ref="o31"/>
</c:Object>
</o:GeneralizationSymbol>
<o:ClassSymbol Id="o13">
<a:CreationDate>1627030935</a:CreationDate>
<a:ModificationDate>1627034076</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-3783,9869), (7081,20506))</a:Rect>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o32"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o27">
<a:CreationDate>1627030937</a:CreationDate>
<a:ModificationDate>1627056816</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((8797,-337), (21205,5359))</a:Rect>
<a:AutoAdjustToText>0</a:AutoAdjustToText>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<a:ManuallyResized>1</a:ManuallyResized>
<c:Object>
<o:Class Ref="o33"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o30">
<a:CreationDate>1627030938</a:CreationDate>
<a:ModificationDate>1627056705</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((13781,13167), (23717,17961))</a:Rect>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o34"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o35">
<a:CreationDate>1627030939</a:CreationDate>
<a:ModificationDate>1628085453</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((11401,-8284), (25947,-3490))</a:Rect>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o36"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o12">
<a:CreationDate>1627030940</a:CreationDate>
<a:ModificationDate>1629722683</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-18075,8513), (-5251,14397))</a:Rect>
<a:AutoAdjustToText>0</a:AutoAdjustToText>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<a:ManuallyResized>1</a:ManuallyResized>
<c:Object>
<o:Class Ref="o37"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o38">
<a:CreationDate>1627030942</a:CreationDate>
<a:ModificationDate>1629722706</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-23765,16469), (-10425,23209))</a:Rect>
<a:AutoAdjustToText>0</a:AutoAdjustToText>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<a:ManuallyResized>1</a:ManuallyResized>
<c:Object>
<o:Class Ref="o39"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o40">
<a:CreationDate>1627030942</a:CreationDate>
<a:ModificationDate>1627056677</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((9328,20438), (23100,27934))</a:Rect>
<a:AutoAdjustToText>0</a:AutoAdjustToText>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<a:ManuallyResized>1</a:ManuallyResized>
<c:Object>
<o:Class Ref="o41"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o42">
<a:CreationDate>1627030943</a:CreationDate>
<a:ModificationDate>1642157895</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-12060,-23325), (1500,-15307))</a:Rect>
<a:AutoAdjustToText>0</a:AutoAdjustToText>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<a:ManuallyResized>1</a:ManuallyResized>
<c:Object>
<o:Class Ref="o43"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o44">
<a:CreationDate>1627056179</a:CreationDate>
<a:ModificationDate>1642506250</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-41658,-25084), (-29894,-17370))</a:Rect>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o45"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o46">
<a:CreationDate>1627059353</a:CreationDate>
<a:ModificationDate>1627061724</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-5699,-11882), (6297,-4168))</a:Rect>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o47"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o48">
<a:CreationDate>1627059475</a:CreationDate>
<a:ModificationDate>1627061370</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-23375,-4421), (-11275,2319))</a:Rect>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o49"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o50">
<a:CreationDate>1628084834</a:CreationDate>
<a:ModificationDate>1628085527</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((12245,-21072), (24675,-14332))</a:Rect>
<a:AutoAdjustToText>0</a:AutoAdjustToText>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<a:ManuallyResized>1</a:ManuallyResized>
<c:Object>
<o:Class Ref="o51"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o52">
<a:CreationDate>1629712043</a:CreationDate>
<a:ModificationDate>1629722649</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-38100,4767), (-25948,12482))</a:Rect>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o53"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o54">
<a:CreationDate>1642156681</a:CreationDate>
<a:ModificationDate>1642505883</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-23774,-14025), (-12076,-8591))</a:Rect>
<a:AutoAdjustToText>0</a:AutoAdjustToText>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<a:ManuallyResized>1</a:ManuallyResized>
<c:Object>
<o:Class Ref="o55"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o56">
<a:CreationDate>1642505030</a:CreationDate>
<a:ModificationDate>1642505785</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-40765,-12069), (-28383,-4355))</a:Rect>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o57"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o58">
<a:CreationDate>1642505338</a:CreationDate>
<a:ModificationDate>1642505682</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-26009,-24937), (-15075,-17853))</a:Rect>
<a:AutoAdjustToText>0</a:AutoAdjustToText>
<a:LineColor>128</a:LineColor>
<a:FillColor>8637161</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<a:ManuallyResized>1</a:ManuallyResized>
<c:Object>
<o:Class Ref="o59"/>
</c:Object>
</o:ClassSymbol>
</c:Symbols>
</o:ClassDiagram>
</c:ClassDiagrams>
<c:DefaultDiagram>
<o:ClassDiagram Ref="o4"/>
</c:DefaultDiagram>
<c:Classes>
<o:Class Id="o32">
<a:ObjectID>62B0FB3A-BBA0-4D93-BC7B-AA778637986C</a:ObjectID>
<a:Name>Utilisateur</a:Name>
<a:Code>Utilisateur</a:Code>
<a:CreationDate>1627030935</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627057643</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o60">
<a:ObjectID>2D7AA651-CFBB-4EB5-BFED-1835B8916BBB</a:ObjectID>
<a:Name>Id</a:Name>
<a:Code>Id</a:Code>
<a:CreationDate>1627032420</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627032475</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o61">
<a:ObjectID>F092DD9F-B4E4-4FFA-ABCF-C4C41509C4D3</a:ObjectID>
<a:Name>NomUtilisateur</a:Name>
<a:Code>NomUtilisateur</a:Code>
<a:CreationDate>1627032420</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627032725</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o62">
<a:ObjectID>E336DE48-53B5-415B-9D7C-1C806912E2A4</a:ObjectID>
<a:Name>TelUtilisateur</a:Name>
<a:Code>TelUtilisateur</a:Code>
<a:CreationDate>1627032666</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627032725</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>long</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o63">
<a:ObjectID>BEF916EB-F1E4-444A-A761-451FB5B84D6C</a:ObjectID>
<a:Name>MotDePasse</a:Name>
<a:Code>MotDePasse</a:Code>
<a:CreationDate>1627032666</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627032725</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o64">
<a:ObjectID>5535D163-6F2B-428C-BF8E-5CC08A3CE9B7</a:ObjectID>
<a:Name>EmailUtilisateur</a:Name>
<a:Code>EmailUtilisateur</a:Code>
<a:CreationDate>1627032666</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627032725</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o65">
<a:ObjectID>08844C26-1E92-4225-8129-BB9D2FBC1154</a:ObjectID>
<a:Name>ImageUtilisateur</a:Name>
<a:Code>ImageUtilisateur</a:Code>
<a:CreationDate>1627057614</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627057643</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o66">
<a:ObjectID>F01F6EB9-88C1-4A84-89DF-5B72013239C0</a:ObjectID>
<a:Name>Créer</a:Name>
<a:Code>Creer</a:Code>
<a:CreationDate>1627032288</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629712636</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o67">
<a:ObjectID>7417B89B-2732-4449-B7B8-A67C599D59E9</a:ObjectID>
<a:Name>Modifier</a:Name>
<a:Code>Modifier</a:Code>
<a:CreationDate>1627032503</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629712636</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>utilisateur</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o68">
<a:ObjectID>0F77C39C-CEBA-471C-B73C-A022315FED1B</a:ObjectID>
<a:Name>Supprimer</a:Name>
<a:Code>Supprimer</a:Code>
<a:CreationDate>1627032503</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629712636</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o33">
<a:ObjectID>CC7F37AF-3475-484A-A24D-D1C02ACCA8B9</a:ObjectID>
<a:Name>Responsable du suivi</a:Name>
<a:Code>Responsable_du_suivi</a:Code>
<a:CreationDate>1627030937</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627032806</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o69">
<a:ObjectID>2570F024-D10C-4C00-AB9E-4781D58682D8</a:ObjectID>
<a:Name>NomResponsable</a:Name>
<a:Code>NomResponsable</a:Code>
<a:CreationDate>1627031562</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627031945</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o70">
<a:ObjectID>62D8354B-32CA-4733-9621-C0B3E2CE0538</a:ObjectID>
<a:Name>PrenomResponsable</a:Name>
<a:Code>PrenomResponsable</a:Code>
<a:CreationDate>1627031562</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627031945</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
</o:Class>
<o:Class Id="o34">
<a:ObjectID>FDB1E966-C11D-417F-A384-C4CBA8ABE9D1</a:ObjectID>
<a:Name>Administrateur</a:Name>
<a:Code>Administrateur</a:Code>
<a:CreationDate>1627030938</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034177</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o71">
<a:ObjectID>DA8514BC-8BBF-42D5-91C9-8DAFDA0F6038</a:ObjectID>
<a:Name>NomAdmin</a:Name>
<a:Code>NomAdmin</a:Code>
<a:CreationDate>1627034095</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034177</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o72">
<a:ObjectID>CFAF2BA7-94E4-4E46-9ED2-BB84C79368FF</a:ObjectID>
<a:Name>PenomAdmin</a:Name>
<a:Code>PenomAdmin</a:Code>
<a:CreationDate>1627034095</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034177</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
</o:Class>
<o:Class Id="o36">
<a:ObjectID>3FB13D15-94A0-4080-ADF2-02FB53361E22</a:ObjectID>
<a:Name>Fonction du moniteur</a:Name>
<a:Code>Fonction_du_moniteur</a:Code>
<a:CreationDate>1627030939</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627056147</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o73">
<a:ObjectID>10CFEEE5-6566-448C-BC0A-FC2BA66F444D</a:ObjectID>
<a:Name>Id</a:Name>
<a:Code>Id</a:Code>
<a:CreationDate>1627033389</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627033591</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o74">
<a:ObjectID>D069EFD3-CB31-4AC9-89A5-D06193830021</a:ObjectID>
<a:Name>LibelleFonction</a:Name>
<a:Code>LibelleFonction</a:Code>
<a:CreationDate>1627033389</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627033949</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o75">
<a:ObjectID>5A0473B4-2F29-4903-B5B7-CF2D0C3D1A61</a:ObjectID>
<a:Name>Modifier</a:Name>
<a:Code>Modifier</a:Code>
<a:CreationDate>1627033872</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034797</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>Fonction_du_moniteur</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
<c:ObjectReturnType>
<o:Class Ref="o36"/>
</c:ObjectReturnType>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o37">
<a:ObjectID>3E9BBC74-1CCF-40CF-843A-2DF84D94638E</a:ObjectID>
<a:Name>Moniteur ENT</a:Name>
<a:Code>Moniteur_ENT</a:Code>
<a:CreationDate>1627030940</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034207</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o76">
<a:ObjectID>13AA35E5-3500-420A-AAFE-7C5C3BA570E7</a:ObjectID>
<a:Name>NomMoniteur</a:Name>
<a:Code>NomMoniteur</a:Code>
<a:CreationDate>1627031713</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627031915</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o77">
<a:ObjectID>AE81567D-C7D9-4D8E-9FE6-DB508210A5D7</a:ObjectID>
<a:Name>PrenomMoniteur</a:Name>
<a:Code>PrenomMoniteur</a:Code>
<a:CreationDate>1627031713</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627031915</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
</o:Class>
<o:Class Id="o39">
<a:ObjectID>AF7D2A4C-A513-4F82-9D89-B85274D0806C</a:ObjectID>
<a:Name>IFAD</a:Name>
<a:Code>IFAD</a:Code>
<a:CreationDate>1627030942</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627033028</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o78">
<a:ObjectID>FCC96ABC-3CE2-4E5A-8428-F0CD7E462F0F</a:ObjectID>
<a:Name>Id</a:Name>
<a:Code>Id</a:Code>
<a:CreationDate>1627032213</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627032236</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o79">
<a:ObjectID>E634C850-083B-49F7-AB24-1970CFCA8500</a:ObjectID>
<a:Name>LibelleIFAD</a:Name>
<a:Code>LibelleIFAD</a:Code>
<a:CreationDate>1627032213</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629724963</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o80">
<a:ObjectID>41E38E2D-5660-4822-A66F-67F1653F38D4</a:ObjectID>
<a:Name>Créer</a:Name>
<a:Code>Creer</a:Code>
<a:CreationDate>1627032966</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034774</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o81">
<a:ObjectID>548AFE17-AC5D-4AD5-B523-B4D4BCD3DFB5</a:ObjectID>
<a:Name>Modifier</a:Name>
<a:Code>Modifier</a:Code>
<a:CreationDate>1627032966</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034774</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>Ifad</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o82">
<a:ObjectID>EAF70F5E-6A15-4C08-947E-DF97F9FBF631</a:ObjectID>
<a:Name>Supprimer</a:Name>
<a:Code>Supprimer</a:Code>
<a:CreationDate>1627032966</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034774</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>String</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o41">
<a:ObjectID>6D5CE205-6693-4BF5-8889-D786369E3AA3</a:ObjectID>
<a:Name>Type_Utilisateur</a:Name>
<a:Code>Type_Utilisateur</a:Code>
<a:CreationDate>1627030942</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034866</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o83">
<a:ObjectID>A76C7E1A-2948-40DB-9978-035645A6E87C</a:ObjectID>
<a:Name>Id</a:Name>
<a:Code>Id</a:Code>
<a:CreationDate>1627032748</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627032775</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o84">
<a:ObjectID>9E289D81-B55E-4D8A-BB21-D8D64E54B6A0</a:ObjectID>
<a:Name>LibelleType</a:Name>
<a:Code>LibelleType</a:Code>
<a:CreationDate>1627032748</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627032775</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o85">
<a:ObjectID>9843673E-4ECE-4A7E-9189-929F828C96E7</a:ObjectID>
<a:Name>Ajouter</a:Name>
<a:Code>Ajouter</a:Code>
<a:CreationDate>1627033067</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034866</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o86">
<a:ObjectID>F95D39A3-33A1-4699-98F1-E5F5F0ED7998</a:ObjectID>
<a:Name>Modifier</a:Name>
<a:Code>Modifier</a:Code>
<a:CreationDate>1627033067</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034866</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>Type_Utilisateur</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
<c:ObjectReturnType>
<o:Class Ref="o41"/>
</c:ObjectReturnType>
</o:Operation>
<o:Operation Id="o87">
<a:ObjectID>390AE50E-5031-4E9F-884A-18E886A6FABB</a:ObjectID>
<a:Name>Supprimer</a:Name>
<a:Code>Supprimer</a:Code>
<a:CreationDate>1627033067</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034866</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o43">
<a:ObjectID>24DC80A9-B72F-4238-8335-48879FCF948C</a:ObjectID>
<a:Name>Activite</a:Name>
<a:Code>Activite</a:Code>
<a:CreationDate>1627030943</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642157741</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o88">
<a:ObjectID>1D1823E6-2F6A-42FC-B9B0-9F69D51B9526</a:ObjectID>
<a:Name>Id</a:Name>
<a:Code>Id</a:Code>
<a:CreationDate>1627033593</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627033746</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o89">
<a:ObjectID>A307EE04-6710-42B5-ACC6-A066A4583A40</a:ObjectID>
<a:Name>LibelleActivite</a:Name>
<a:Code>LibelleActivite</a:Code>
<a:CreationDate>1627062878</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627062936</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o90">
<a:ObjectID>AB098872-3C4B-45F3-A591-9AA602527782</a:ObjectID>
<a:Name>IdentifiantActivite</a:Name>
<a:Code>IdentifiantActivite</a:Code>
<a:CreationDate>1642157658</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642157719</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o91">
<a:ObjectID>3B55456E-EB88-45A7-B168-5C65F30B50D1</a:ObjectID>
<a:Name>Ajouter</a:Name>
<a:Code>Ajouter</a:Code>
<a:CreationDate>1627033751</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034830</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o92">
<a:ObjectID>36F75B0F-2819-4787-8E2F-71356785B207</a:ObjectID>
<a:Name>Modifier</a:Name>
<a:Code>Modifier</a:Code>
<a:CreationDate>1627033751</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034830</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>Activite</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
<c:ObjectReturnType>
<o:Class Ref="o43"/>
</c:ObjectReturnType>
</o:Operation>
<o:Operation Id="o93">
<a:ObjectID>D1D8ACFC-C851-48E5-A209-FC479196D74F</a:ObjectID>
<a:Name>Supprimer</a:Name>
<a:Code>Supprimer</a:Code>
<a:CreationDate>1627033751</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034830</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o45">
<a:ObjectID>6FD3BB05-6FA3-46AD-BB4E-13EA853051DB</a:ObjectID>
<a:Name>Fichier_Joint</a:Name>
<a:Code>Fichier_Joint</a:Code>
<a:CreationDate>1627056179</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627062273</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o94">
<a:ObjectID>A9619B1A-EDEA-4844-AF56-04ABB9123189</a:ObjectID>
<a:Name>Id</a:Name>
<a:Code>Id</a:Code>
<a:CreationDate>1627056482</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627056514</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o95">
<a:ObjectID>505817ED-33E3-4C30-85A9-45A25847379F</a:ObjectID>
<a:Name>LibelleFichier</a:Name>
<a:Code>LibelleFichier</a:Code>
<a:CreationDate>1627056482</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627056619</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o96">
<a:ObjectID>6EAC28A5-F61F-4441-B6D2-D493CFABFF26</a:ObjectID>
<a:Name>UrlFichier</a:Name>
<a:Code>UrlFichier</a:Code>
<a:CreationDate>1627062253</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627062273</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o97">
<a:ObjectID>C5CA9ECD-67B6-41EF-A67C-0FF23A326230</a:ObjectID>
<a:Name>Ajouter</a:Name>
<a:Code>Ajouter</a:Code>
<a:CreationDate>1627057362</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627057431</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o98">
<a:ObjectID>7707B186-62EF-40C8-B73A-018D1FEC9E26</a:ObjectID>
<a:Name>Modifier</a:Name>
<a:Code>Modifier</a:Code>
<a:CreationDate>1627057362</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627057431</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>Fichier_Joint</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
<c:ObjectReturnType>
<o:Class Ref="o45"/>
</c:ObjectReturnType>
</o:Operation>
<o:Operation Id="o99">
<a:ObjectID>5302A3C6-F7C5-4E84-BBAB-5B4C011E7E96</a:ObjectID>
<a:Name>Supprimer</a:Name>
<a:Code>Supprimer</a:Code>
<a:CreationDate>1627057362</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627057431</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o47">
<a:ObjectID>3BA2442B-D0E3-489A-9947-90E5F45B8494</a:ObjectID>
<a:Name>Commentaire</a:Name>
<a:Code>Commentaire</a:Code>
<a:CreationDate>1627059353</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627060474</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o100">
<a:ObjectID>DD902E6E-4DD4-4C36-BB92-066A9F44E7CC</a:ObjectID>
<a:Name>Id</a:Name>
<a:Code>Id</a:Code>
<a:CreationDate>1627059369</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627059434</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o101">
<a:ObjectID>2ECD9685-F9A2-4EBE-BE46-79DE856E2BB6</a:ObjectID>
<a:Name>Description</a:Name>
<a:Code>Description</a:Code>
<a:CreationDate>1627059369</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627059434</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o102">
<a:ObjectID>F99C9C23-F368-49C3-B836-255C29153631</a:ObjectID>
<a:Name>DateCommentaire</a:Name>
<a:Code>DateCommentaire</a:Code>
<a:CreationDate>1627060455</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627060474</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>Date</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o103">
<a:ObjectID>C841AB66-47C6-4661-935E-95EF76925082</a:ObjectID>
<a:Name>Ajouter</a:Name>
<a:Code>Ajouter</a:Code>
<a:CreationDate>1627059369</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627059434</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o104">
<a:ObjectID>F112D0E3-5949-4CC7-8FC2-38EF79E89270</a:ObjectID>
<a:Name>Modifier</a:Name>
<a:Code>Modifier</a:Code>
<a:CreationDate>1627059369</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627059434</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>Commentaire</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
<c:ObjectReturnType>
<o:Class Ref="o47"/>
</c:ObjectReturnType>
</o:Operation>
<o:Operation Id="o105">
<a:ObjectID>97F37AA8-D784-45FD-B4A2-301ABDE74612</a:ObjectID>
<a:Name>Supprimer</a:Name>
<a:Code>Supprimer</a:Code>
<a:CreationDate>1627059369</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627059434</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o49">
<a:ObjectID>11220EDC-3FA4-4968-BD81-FA11501B8666</a:ObjectID>
<a:Name>Rapport</a:Name>
<a:Code>Rapport</a:Code>
<a:CreationDate>1627059475</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627061061</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o106">
<a:ObjectID>6AEFABCA-C136-40DC-A0BB-CAB9700D18C7</a:ObjectID>
<a:Name>Id</a:Name>
<a:Code>Id</a:Code>
<a:CreationDate>1627059607</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627059651</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o107">
<a:ObjectID>69FDB1A7-212E-4D94-9FE5-38A3326698A4</a:ObjectID>
<a:Name>LibelleRapport</a:Name>
<a:Code>LibelleRapport</a:Code>
<a:CreationDate>1627059607</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627059651</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o108">
<a:ObjectID>12702AB6-3816-429F-A5FC-8ED94F4BD619</a:ObjectID>
<a:Name>DateEnregistrement</a:Name>
<a:Code>DateEnregistrement</a:Code>
<a:CreationDate>1627059607</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627059651</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>Date</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o109">
<a:ObjectID>7A807698-7207-4EC4-BD93-64D104637800</a:ObjectID>
<a:Name>EtatRapport</a:Name>
<a:Code>EtatRapport</a:Code>
<a:CreationDate>1627061046</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627061061</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o110">
<a:ObjectID>4E1C922D-2EFA-4DCF-8CD1-808EF02BBE35</a:ObjectID>
<a:Name>Ajouter</a:Name>
<a:Code>Ajouter</a:Code>
<a:CreationDate>1627059660</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629712606</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o51">
<a:ObjectID>0C47A02A-B6EB-428A-A92D-073133E29032</a:ObjectID>
<a:Name>Type_Activite</a:Name>
<a:Code>Type_Activite</a:Code>
<a:CreationDate>1628084834</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1628085043</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o111">
<a:ObjectID>0F653885-8179-4E8C-90F5-B84BB79D9838</a:ObjectID>
<a:Name>Id</a:Name>
<a:Code>Id</a:Code>
<a:CreationDate>1628084840</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1628084909</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o112">
<a:ObjectID>8BF00430-CFC1-4666-BA9D-ADDB8C765208</a:ObjectID>
<a:Name>LibelleType</a:Name>
<a:Code>LibelleType</a:Code>
<a:CreationDate>1628084840</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1628087007</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o113">
<a:ObjectID>289BCE8D-408C-4F2B-A190-4DEFF4FB151D</a:ObjectID>
<a:Name>Ajouter</a:Name>
<a:Code>Ajouter</a:Code>
<a:CreationDate>1628084956</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1628085043</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o114">
<a:ObjectID>12167AB5-81A0-4CA9-9C7B-E3340138D6AD</a:ObjectID>
<a:Name>Modifier</a:Name>
<a:Code>Modifier</a:Code>
<a:CreationDate>1628084956</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1628085043</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>Type_Activite</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
<c:ObjectReturnType>
<o:Class Ref="o51"/>
</c:ObjectReturnType>
</o:Operation>
<o:Operation Id="o115">
<a:ObjectID>3A642F7B-36A1-4EF4-9067-2AD3CC3E4C5F</a:ObjectID>
<a:Name>Supprimer</a:Name>
<a:Code>Supprimer</a:Code>
<a:CreationDate>1628084956</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1628085043</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o53">
<a:ObjectID>39FE6FF5-048D-412E-96F6-679C31724E1E</a:ObjectID>
<a:Name>IFAD_Moniteur</a:Name>
<a:Code>IFAD_Moniteur</a:Code>
<a:CreationDate>1629712043</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629728688</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o116">
<a:ObjectID>9B571222-1FF5-4C69-9A5D-193E92AFB02D</a:ObjectID>
<a:Name>Id</a:Name>
<a:Code>Id</a:Code>
<a:CreationDate>1629712048</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629712157</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o117">
<a:ObjectID>624CE542-97C9-4AE7-900D-A1E404D45E4A</a:ObjectID>
<a:Name>DateDebut</a:Name>
<a:Code>DateDebut</a:Code>
<a:CreationDate>1629725477</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629728688</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>Date</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o118">
<a:ObjectID>3AD45F56-46ED-4876-ABB7-131BC9185DBD</a:ObjectID>
<a:Name>DateFin</a:Name>
<a:Code>DateFin</a:Code>
<a:CreationDate>1629728659</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629728688</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>Date</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o119">
<a:ObjectID>4443AB2E-4C43-48F0-803D-C129E418D237</a:ObjectID>
<a:Name>Ajouter</a:Name>
<a:Code>Ajouter</a:Code>
<a:CreationDate>1629712048</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629712157</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o120">
<a:ObjectID>EEDC7615-A1CF-4D69-9E68-F65D2BD45ACB</a:ObjectID>
<a:Name>Modifier</a:Name>
<a:Code>Modifier</a:Code>
<a:CreationDate>1629712048</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629725382</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>ifad_moniteur</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o121">
<a:ObjectID>F99685B9-ABDC-4185-BFBA-98BAEA650F4C</a:ObjectID>
<a:Name>Supprimer</a:Name>
<a:Code>Supprimer</a:Code>
<a:CreationDate>1629712048</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629712157</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o55">
<a:ObjectID>F1B0B5B1-98A5-44E8-9172-E7CB316959CB</a:ObjectID>
<a:Name>Livret_Positionnement</a:Name>
<a:Code>Livret_Positionnement</a:Code>
<a:CreationDate>1642156681</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505542</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o122">
<a:ObjectID>6C694109-C1F4-425B-9411-469416F0BA40</a:ObjectID>
<a:Name>Id</a:Name>
<a:Code>Id</a:Code>
<a:CreationDate>1642156809</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642157061</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o123">
<a:ObjectID>563663F2-87E0-49BF-B000-263E54D577F7</a:ObjectID>
<a:Name>DateEnregistrement</a:Name>
<a:Code>DateEnregistrement</a:Code>
<a:CreationDate>1642156809</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505542</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>Date</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o124">
<a:ObjectID>DA2D502D-2AD5-4FFE-89B2-472084FD8765</a:ObjectID>
<a:Name>Ajouter</a:Name>
<a:Code>Ajouter</a:Code>
<a:CreationDate>1642156809</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642157061</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o57">
<a:ObjectID>9B2E5589-24E0-4274-886A-E203E33EEB44</a:ObjectID>
<a:Name>Activie_Saisie</a:Name>
<a:Code>Activie_Saisie</a:Code>
<a:CreationDate>1642505030</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505494</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o125">
<a:ObjectID>5B3DB3B4-AECD-4BBC-8647-F408180CD493</a:ObjectID>
<a:Name>id</a:Name>
<a:Code>id</a:Code>
<a:CreationDate>1642505032</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505299</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o126">
<a:ObjectID>ADDFC84D-59EE-4B25-9329-B44FF26FAFF9</a:ObjectID>
<a:Name>Titre</a:Name>
<a:Code>Titre</a:Code>
<a:CreationDate>1642505032</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505299</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o127">
<a:ObjectID>F3DE1BBD-A87D-4184-B560-A4B0887DDB24</a:ObjectID>
<a:Name>Description</a:Name>
<a:Code>Description</a:Code>
<a:CreationDate>1642505032</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505299</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>long</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o128">
<a:ObjectID>1A9E9503-3C28-4FA9-AA93-A0C629B8ADE3</a:ObjectID>
<a:Name>Ajouter</a:Name>
<a:Code>Ajouter</a:Code>
<a:CreationDate>1642505428</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505494</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o129">
<a:ObjectID>028F2E0A-BB13-47B8-B86D-938A82D1EE90</a:ObjectID>
<a:Name>Modifier</a:Name>
<a:Code>Modifier</a:Code>
<a:CreationDate>1642505428</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505494</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>Activite_Saisie</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
<o:Operation Id="o130">
<a:ObjectID>2CE87AAC-9F19-44E5-9809-54A80B4AA294</a:ObjectID>
<a:Name>Supprimer</a:Name>
<a:Code>Supprimer</a:Code>
<a:CreationDate>1642505428</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505494</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
<o:Class Id="o59">
<a:ObjectID>19EB7D35-4640-4CBD-B1EE-D857BF36BD11</a:ObjectID>
<a:Name>Positionnement</a:Name>
<a:Code>Positionnement</a:Code>
<a:CreationDate>1642505338</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505422</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o131">
<a:ObjectID>52AF82AA-7FEB-40E2-9A02-705823191F4D</a:ObjectID>
<a:Name>id</a:Name>
<a:Code>id</a:Code>
<a:CreationDate>1642505340</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505422</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o132">
<a:ObjectID>C6DCFB59-B9AC-4EB8-B46A-28FE8F9188A2</a:ObjectID>
<a:Name>ValeurPost</a:Name>
<a:Code>ValeurPost</a:Code>
<a:CreationDate>1642505340</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505422</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o133">
<a:ObjectID>C98380B7-EDA9-4EB8-BAED-E518920D9B6F</a:ObjectID>
<a:Name>TempsPost</a:Name>
<a:Code>TempsPost</a:Code>
<a:CreationDate>1642505340</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505422</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Operations>
<o:Operation Id="o134">
<a:ObjectID>20E8B412-4E38-4E3B-8757-1EC3B3E59919</a:ObjectID>
<a:Name>Ajouter</a:Name>
<a:Code>Ajouter</a:Code>
<a:CreationDate>1642505340</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642505422</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:ReturnType>void</a:ReturnType>
<a:TemplateBody>%DefaultBody%</a:TemplateBody>
</o:Operation>
</c:Operations>
</o:Class>
</c:Classes>
<c:Generalizations>
<o:Generalization Id="o28">
<a:ObjectID>9EC5FFCB-BF32-4E8D-AAF8-FE46B244297A</a:ObjectID>
<a:Name>Generalisation_2</a:Name>
<a:Code>Generalisation_2</a:Code>
<a:CreationDate>1627034237</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034237</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<c:Object1>
<o:Class Ref="o32"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o33"/>
</c:Object2>
</o:Generalization>
<o:Generalization Id="o31">
<a:ObjectID>9C8A6121-7CAF-4C71-B996-7B9C79C563BF</a:ObjectID>
<a:Name>Generalisation_3</a:Name>
<a:Code>Generalisation_3</a:Code>
<a:CreationDate>1627034245</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1627034245</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<c:Object1>
<o:Class Ref="o32"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o34"/>
</c:Object2>
</o:Generalization>
<o:Generalization Id="o14">
<a:ObjectID>EBD5A6E3-E142-445D-AED7-91FCD003358A</a:ObjectID>
<a:Name>Generalisation_4</a:Name>
<a:Code>Generalisation_4</a:Code>
<a:CreationDate>1629724897</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1629724897</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<c:Object1>
<o:Class Ref="o32"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o37"/>
</c:Object2>
</o:Generalization>
</c:Generalizations>
<c:TargetModels>
<o:TargetModel Id="o135">
<a:ObjectID>4D0DD866-CBE8-4020-AF95-B36ECD0F692B</a:ObjectID>
<a:Name>Analyse</a:Name>
<a:Code>Analysis</a:Code>
<a:CreationDate>1627030929</a:CreationDate>
<a:Creator>T.T.Joël</a:Creator>
<a:ModificationDate>1642502539</a:ModificationDate>
<a:Modifier>T.T.Joël</a:Modifier>
<a:TargetModelURL>file:///%_OBJLANG%/analysis.xol</a:TargetModelURL>
<a:TargetModelID>87317290-AF03-469F-BC1E-99593F18A4AB</a:TargetModelID>
<a:TargetModelClassID>1811206C-1A4B-11D1-83D9-444553540000</a:TargetModelClassID>
<c:SessionShortcuts>
<o:Shortcut Ref="o3"/>
</c:SessionShortcuts>
</o:TargetModel>
</c:TargetModels>
</o:Model>
</c:Children>
</o:RootObject>

</Model>